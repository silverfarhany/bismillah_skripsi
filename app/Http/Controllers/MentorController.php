<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Member;
use App\Models\Mentor;
use App\Models\Division;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;

class MentorController extends Controller
{
    public function index()
    {
        $division = Division::select('id', 'name')->get();
        $mentors = Mentor::all();
        $members = Member::select('id', 'name')->get();
        return view('pembimbing.create', compact('division', 'mentors', 'members'));
    }

    public function storeDataPost(Request $request)
    {
        // dd($addMentor);          
        $validated = $request->validate([
            'divisions_id' => 'required',
            'name' => 'required|max:255',
            'email' => 'required|unique:mentors',
            'phone' => 'required|max:15'
        ]);

        $is_hr = 0;
        if(!empty($request->akses_hr)){
            $is_hr = 1;
        }


        $addMentor = Mentor::create([
            'divisions_id' => $request->get('divisions_id'),
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'is_hr'=>$is_hr,

        ]);

        // dd($addMentor);
        $addMentor->save();
        return redirect('/creatementor')->with('success', 'Data Berhasil ditambahkan');
    }

    public function delete($id)
    {
        $mentor = Mentor::find($id);
        $user = User::where('email', $mentor->email)->first();
        $user->delete();
        $mentor->delete();
        return redirect('/creatementor');
    }

    public function edit($id)
    {
        $mentors = Mentor::findOrFail($id);
        $members = Member::select('id', 'name')->get();
        $divisions = Division::select('id', 'name')->get();
        // dd($tasks);          
        return view('pembimbing.edit', [
            'members' => $members,
            'divisions' => $divisions,
            'mentors' => $mentors
        ]);
    }

    public function update(Request $request, Mentor $mentor)
    {

        $request->validate([
            'divisions_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required'
        ]);


        $divisions_id = $request->divisions_id;
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;

        $user = User::where('email', $mentor->email)->first();
        $user->update([
            'email' => $email,
        ]);
        $mentor->update([
            'divisions_id' => $divisions_id,
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
        ]);



        // dd($updateTask);
        // Mentor::where('id', $request->id_mentor)->update($updateMentor);
        // dd($updateTask);           
        return redirect('/creatementor');
    }

    public function export(){
        $spreadsheet = IOFactory::load('file/excel_template/Data-Pembimbing.xlsx');
        foreach(range('A','G') as $columnID) {
            $spreadsheet->getActiveSheet()->getColumnDimension($columnID)
                ->setAutoSize(true);
        }
        $mentors = Mentor::with('getDivision')->get();
        $row = 3;
        $no = 1;
        foreach ($mentors as $mentor) {
            $spreadsheet->setActiveSheetIndex(0)->setCellValue("A{$row}", "{$no}");
            $spreadsheet->setActiveSheetIndex(0)->setCellValue("B{$row}", $mentor->name);
            $spreadsheet->setActiveSheetIndex(0)->setCellValue("C{$row}", @$mentor->getDivision->name);
            $spreadsheet->setActiveSheetIndex(0)->setCellValue("D{$row}", $mentor->email);
            $row++;
            $no++;
        }
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        ob_end_clean(); 
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment; filename=Reports Pembimbing_" . date('Y-m-d') . ".xlsx");
        $writer->save('php://output');
    }
}
