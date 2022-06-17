<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Point;
use App\Models\Member;
use App\Models\Mentor;
use App\Models\Division;
use Illuminate\Http\Request;
use App\Models\FormEvaluation;
use App\Models\MemberEvaluation;
use App\Models\EvaluationParameter;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\Validator;

class ScoreController extends Controller
{
    public function index(){
        $members = Member::doesntHave('formEvaluation')->select('id','name')->where('mentors_id',session()->get('id'))->get();
        $data['parameter_A'] = EvaluationParameter::where('category','A')->get();
        $data['parameter_B'] = EvaluationParameter::where('category','B')->get();
        $data['parameter_C'] = EvaluationParameter::where('category','C')->get();
        
        // $points = Point::all();
        return view('score.create',compact('members'))->with($data);
    }

    public function read(){
        $data['parameter_A'] = EvaluationParameter::where('category','A')->get();
        $data['parameter_B'] = EvaluationParameter::where('category','B')->get();
        $data['parameter_C'] = EvaluationParameter::where('category','C')->get();
        if(auth()->user()->role == '3'){
            $forms = FormEvaluation::with('member')->get();
        }else{
            $forms = FormEvaluation::with('member')->where('evaluator',session()->get('id'))->get();
        }
        
        // $points = Point::all();
        return view('score.read',compact('forms'))->with($data);
    }

    public function CreateScore(Request $request)
    {
        $request->validate([
            'members_id'=>'required',
            'point' => 'required',                                   
        ]);
        $form = FormEvaluation::create([
            'member_id'=>$request->members_id,
            'evaluator'=>session()->get('id'),
            'date'=>date('Y-m-d')
        ]);
        $subPoint = 0;
        $jumlahParameter = EvaluationParameter::count();
        $parameters = EvaluationParameter::all();
        foreach($parameters as $parameter){
            $addScore = MemberEvaluation::create([    
                'parameter_id' => $parameter->id,
                'form_id' => $form->id,            
                'point' => $request->point[$parameter->id],            
            ]);
            $subPoint += $request->point[$parameter->id];
        }
        $average = round($subPoint/$jumlahParameter,2);
        $predikat = null;
        if($average >=90){
            $predikat = "Memuaskan";
        }
        else if($average >= 80 && $average <= 89){
            $predikat = "Baik";
        }
        else if($average >= 70 && $average <= 79){
            $predikat = "Cukup";
        }else{
            $predikat = "Kurang";
        }
       
        $form->update([
            'average'=>$average,
            'predicate'=>$predikat
        ]);

        return back()->with('success','Penilaian Berhasil dilakukan');

    }

    public function delete($id)
    {
        Point::find($id)->delete();
        return redirect('/readscore');
    }

    public function edit($id) {
        $points = Point::findOrFail($id);  
        $mentors = Mentor::select('id','name')->get();
        $members = Member::select('id','name')->get();
        $task = Task::select('id','name')->get();
        // dd($points);              
        return view('score.edit',[                        
            'members' => $members,
            'mentors' => $mentors,
            'task' => $task,
            'points' => $points,
        ]);
    }

    public function update(Request $request, Point $point)
    {
        // dd($request);
        $request->validate([          
            'mentors_id'=>'required',
            'members_id'=>'required',
            'tasks_id' => 'required',
            'point' => 'required',                                      
        ]);      

        $members_id = $request->members_id;
        $mentors_id = $request->mentors_id;
        $tasks_id = $request->tasks_id;
        $point = $request->point;
        
        $updateScore = [           
            'mentors_id' => $mentors_id,
            'members_id' => $members_id,            
            'tasks_id' => $tasks_id,
            'point' => $point,            
        ];
        // dd($updateScore);
        // dd($request);
        Point::where('id',$request->id_point)->update($updateScore);   
        // dd(Point::where('id',$request->id));     
        return redirect('/readscore');

    }

    public function nilaiPeserta(){
        $data['parameter_A'] = EvaluationParameter::where('category','A')->get();
        $data['parameter_B'] = EvaluationParameter::where('category','B')->get();
        $data['parameter_C'] = EvaluationParameter::where('category','C')->get();
        $formEvaluasi = FormEvaluation::with('evaluasi')->where('member_id',session()->get('id'))->first();
        $member = Member::where('id',session()->get('id'))->first();
        // $data['parameter_A'] = MemberEvaluation::with(['parameter'=>function($query){
        //     $query->where('category','A');
        // }])->where('form_id',$formEvaluasi->id)->get();
        // $data['parameter_B'] = MemberEvaluation::with(['parameter'=>function($query){
        //     $query->where('category','B');
        // }])->where('form_id',$formEvaluasi->id)->get();
        // $data['parameter_C'] = MemberEvaluation::with(['parameter'=>function($query){
        //     $query->where('category','C');
        // }])->where('form_id',$formEvaluasi->id)->get();
        return view('peserta.final',compact('formEvaluasi','member'))->with($data);
    }

    public function getScorebyForm(FormEvaluation $form){
        $form->load('evaluasi');
        $score = $form->evaluasi;
        return response()->json(['score'=>$score,'form'=>$form]);
        
    }

    public function export(){
        $spreadsheet = IOFactory::load('file/excel_template/Data-Nilai.xlsx');
        $spreadsheet->getActiveSheet()->getColumnDimension("A")
        ->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension("B")
        ->setAutoSize(true);
        $row = 4;
        $no = 1;
        if(auth()->user()->role == '3'){
            $formEvaluasi = FormEvaluation::with('evaluasi','member')->get();
        }else{
            $formEvaluasi = FormEvaluation::with('evaluasi','member')->where('evaluator',session()->get('id'))->get();
        }
        foreach ($formEvaluasi as $form) {
            $spreadsheet->setActiveSheetIndex(0)->setCellValue("A{$row}", "{$no}");
            $spreadsheet->setActiveSheetIndex(0)->setCellValue("B{$row}", $form->member->name);
            $spreadsheet->setActiveSheetIndex(0)->setCellValue("O{$row}", $form->average);
            $spreadsheet->setActiveSheetIndex(0)->setCellValue("P{$row}", $form->predicate);
            $spreadsheet->setActiveSheetIndex(0)->setCellValue("C{$row}", $form->evaluasi->where('parameter_id',1)->first()->point);
            $spreadsheet->setActiveSheetIndex(0)->setCellValue("D{$row}", $form->evaluasi->where('parameter_id',2)->first()->point);
            $spreadsheet->setActiveSheetIndex(0)->setCellValue("E{$row}", $form->evaluasi->where('parameter_id',3)->first()->point);
            $spreadsheet->setActiveSheetIndex(0)->setCellValue("F{$row}", $form->evaluasi->where('parameter_id',4)->first()->point);
            $spreadsheet->setActiveSheetIndex(0)->setCellValue("G{$row}", $form->evaluasi->where('parameter_id',5)->first()->point);
            $spreadsheet->setActiveSheetIndex(0)->setCellValue("H{$row}", $form->evaluasi->where('parameter_id',6)->first()->point);
            $spreadsheet->setActiveSheetIndex(0)->setCellValue("I{$row}", $form->evaluasi->where('parameter_id',7)->first()->point);
            $spreadsheet->setActiveSheetIndex(0)->setCellValue("J{$row}", $form->evaluasi->where('parameter_id',8)->first()->point);
            $spreadsheet->setActiveSheetIndex(0)->setCellValue("K{$row}", $form->evaluasi->where('parameter_id',9)->first()->point);
            $spreadsheet->setActiveSheetIndex(0)->setCellValue("L{$row}", $form->evaluasi->where('parameter_id',10)->first()->point);
            $spreadsheet->setActiveSheetIndex(0)->setCellValue("M{$row}", $form->evaluasi->where('parameter_id',11)->first()->point);
            $spreadsheet->setActiveSheetIndex(0)->setCellValue("N{$row}", $form->evaluasi->where('parameter_id',12)->first()->point);
            $row++;
            $no++;
        }
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        ob_end_clean(); 
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment; filename=Reports Score_" . date('Y-m-d') . ".xlsx");
        $writer->save('php://output');
    }
}
