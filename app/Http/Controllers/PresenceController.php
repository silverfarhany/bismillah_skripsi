<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Member;
use App\Models\Presence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use PhpOffice\PhpSpreadsheet\IOFactory;

class PresenceController extends Controller
{
    public function index()
    {
        $members = Member::select('id', 'name')->get();
        return view('member.index', compact('members'));
    }

    public function submit(Request $request)
    {
        $proof_name = $request->proof->getClientOriginalName();
        $request->proof->storeAs('public/files/proof', $proof_name);
        $request->validate([
            'members_id' => 'required',
            'date' => 'required',
            'end' => 'required',
            'activity' => 'required',
            'proof' => 'required|mimes:txt,xlx,xls,pdf,jpg,png'
        ]);

        $proof_name = $request->proof->getClientOriginalName();
        // $request->proof->storeAs('public/files/proof', $proof_name);

        $members_id = $request->session()->get('id');
        $date = $request->Carbon::now()->format('Y-m-d');
        $end = $request->Carbon::now()->format('H:i:m');
        $activity = $request->activity;
        $proof = $request->proof->storeAs('public/files/proof', $proof_name);

        dd($request->$proof);
        $submitPresence = new Presence([
            'members_id' => $members_id,
            'date' => $date,
            'end' => $end,
            'activity' => $activity,
            'proof' => $proof,
        ]);

        dd($submitPresence);
        $submitPresence->save();
        return redirect('/homepeserta');
    }

    public function startPresence()
    {
        Presence::create([
            'members_id' => Member::where('email', auth()->user()->email)->first()->id,
            'date' => date('Y-m-d'),
            'start' => date('H:i:s')
        ]);

        return back()->with('success', 'Presensi berhasil di start');
    }

    public function finishPresence(Request $request)
    {
        $request->validate([
            'activity' => 'required',
            'proof' => 'required|mimes:txt,xlx,xls,xlsx,pdf,jpg,png',
        ]);
        $fileName = null;
        if ($request->hasFile('proof')) {
            $file = $request->proof;
            $dest = 'file/proof_presence';
            $fileName = 'proof' . '_' . date("YmdHis") . auth()->user()->id .  "." . $file->getClientOriginalExtension();
            $file->move($dest, $fileName);
        }

        $absen = Presence::where('members_id', Member::where('email', auth()->user()->email)->first()->id)->where('date', date('Y-m-d'))->first();
        $absen->update([
            'end' => date('H:i:s'),
            'activity' => $request->activity,
            'proof' => $fileName,
        ]);

        return back()->with('success', 'Presensi berhasil disubmit');
    }

    public function getMyPresence()
    {
        $presences = Presence::where('members_id', Member::where('email', auth()->user()->email)->first()->id)->get();
        return view('presensi.read', compact('presences'));
    }

    public function getMemberPresence(Member $id)
    {
        $id->load('getPresensi');
        $data = [];
        foreach ($id->getPresensi as $presensi) {
            $data[] = [
                'date' => date('d F Y', strtotime($presensi->date)),
                'start' => date('H:i', strtotime($presensi->start)),
                'end' => empty($presensi->end) ? null : date('H:i', strtotime($presensi->end)),
                'activity' => empty($presensi->activity) ? '-' : $presensi->activity,
                'proof' => empty($presensi->proof) ? null : $presensi->proof
            ];
        }
        return response()->json(['data' => $data]);
    }

    public function export(Request $request){
        $request->validate([
            'start'=>'required',
            'end'=>'required'
        ]);
        $spreadsheet = IOFactory::load('file/excel_template/Data-Presensi.xlsx');
        foreach(range('A','H') as $columnID) {
            $spreadsheet->getActiveSheet()->getColumnDimension($columnID)
                ->setAutoSize(true);
        }
        if(auth()->user()->role == '3'){
            $presences = Presence::with('getMember')->where('date','>=',$request->start)->where('date','<=',$request->end)->orderBy('date')->get();
        }else{
            $presences = Presence::with('getMember')->whereHas('getMember',function($query){$query->where('mentors_id',session()->get('id'));})->where('date','>=',$request->start)->where('date','<=',$request->end)->orderBy('date')->get();
        }
       
        $row = 3;
        $no = 1;
        foreach ($presences as $presence) {
            $spreadsheet->setActiveSheetIndex(0)->setCellValue("A{$row}", "{$no}");
            $spreadsheet->setActiveSheetIndex(0)->setCellValue("B{$row}", date('d F Y',strtotime($presence->date)));
            $spreadsheet->setActiveSheetIndex(0)->setCellValue("C{$row}", $presence->getMember->name);
            $spreadsheet->setActiveSheetIndex(0)->setCellValue("D{$row}", $presence->getMember->nikp);
            $spreadsheet->setActiveSheetIndex(0)->setCellValue("E{$row}", $presence->activity);
            $spreadsheet->setActiveSheetIndex(0)->setCellValue("F{$row}", $presence->proof);
            $spreadsheet->setActiveSheetIndex(0)->setCellValue("G{$row}", date('H:i',strtotime($presence->start)));
            $spreadsheet->setActiveSheetIndex(0)->setCellValue("H{$row}", date('H:i',strtotime($presence->end)));
            $spreadsheet->getActiveSheet()->getCell("F{$row}")->getHyperlink()->setUrl(URL::to('/file/proof_presence/'.$presence->proof));
            $row++;
            $no++;
        }
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        ob_end_clean(); 
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment; filename=Reports Presensi_" . date('Y-m-d',strtotime($request->start)) . '_to_' . date('Y-m-d',strtotime($request->end)) .".xlsx");
        $writer->save('php://output');
    }
}
