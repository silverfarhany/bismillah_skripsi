<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\DailyJournal;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;

class DailyJournalController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'description'=>'required',
            'minute'=>'required',
        ]);

        DailyJournal::create([
            'member_id'=>$request->session()->get('id'),
            'date'=>date('Y-m-d'),
            'description'=>$request->description,
            'minute'=>$request->minute,
        ]);
        return back()->with('success','Jurnal Harian berhasil di input!');
    }

    public function delete(DailyJournal $id){
        $id->delete();
        return back()->with('success','Data berhasil dihapus');
    }

    public function approve(DailyJournal $id){
        $id->update([
            'status'=>2,
            'approval_at'=>date('Y-m-d')
        ]);

        return back()->with('success','Jurnal Harian berhasil di Approve');
    }

    public function reject(DailyJournal $id){
        $id->update([
            'status'=>1,
            'approval_at'=>date('Y-m-d')
        ]);

        return back()->with('success','Jurnal Harian berhasil di Reject');
    }

    public function journalToday(Request $request){
        $journals = DailyJournal::where('member_id',$request->session()->get('id'))->where('date',date('Y-m-d'))->get();
        return response()->json(['data'=>$journals]);
    }

    public function getDailyJournal($id){
        $journals = DailyJournal::where('member_id',$id)->where('date',date('Y-m-d'))->get();
        return response()->json(['data'=>$journals]);
    }

    public function getMemberJournal($id){
        $journalDate = DailyJournal::select('date')->where('member_id',$id)->groupBy('date')->get();
        $peserta = Member::where('id',$id)->first();;
        return view('peserta.jurnalHarian',compact('journalDate','peserta'));
    }

    public function export($id){
        $member = Member::find($id);
        $spreadsheet = IOFactory::load('file/excel_template/Data-Jurnal-Harian.xlsx');
        $spreadsheet->setActiveSheetIndex(0)->setCellValue("C1", "{$member->name}");
        foreach(range('A','G') as $columnID) {
            $spreadsheet->getActiveSheet()->getColumnDimension($columnID)
                ->setAutoSize(true);
        }
        $journalDate = DailyJournal::select('date')->where('member_id',$id)->groupBy('date')->get();
        $row = 3;
        $no = 1;
        foreach ($journalDate as $journal) {
            $spreadsheet->setActiveSheetIndex(0)->setCellValue("A{$row}", "{$no}");
            $spreadsheet->setActiveSheetIndex(0)->setCellValue("B{$row}", date('d F Y',strtotime($journal->date)));
            $details = DailyJournal::where('date',$journal->date)->where('status',2)->get();
            foreach($details as $detail){
                $spreadsheet->setActiveSheetIndex(0)->setCellValue("C{$row}", $detail->description);
                $spreadsheet->setActiveSheetIndex(0)->setCellValue("D{$row}", $detail->minute ." Menit");
                $row++;
            };
            $no++;
        }
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        ob_end_clean(); 
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment; filename=JurnalHarian_" . $member->name ."_". date('Y-m-d') . ".xlsx");
        $writer->save('php://output');
    }
}
