<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Member;
use Illuminate\Http\Request;

class CertificateController extends Controller
{

    public function formUpload(){
        $members = Member::with('certificate')->get();
        return view('sertifikat.uploadSertifikat',compact('members'));
    }
    
    public function uploadCertificate(Request $request){
        $request->validate([
            'idMember'=>'required',
            'file'=>'required|mimes:pdf,jpg,jpeg,png'
        ]); 
        $member= Member::where('id',$request->idMember)->first();
        $fileName = null;
        if ($request->hasFile('file')) {
            $file = $request->file;
            $dest = 'file/sertifikat_peserta';
            $fileName = 'certificate' . '_' . $member->name . '_' .date("YmdHis") . auth()->user()->id .  "." . $file->getClientOriginalExtension();
            $file->move($dest, $fileName);
        }

        Certificate::create([
            'member_id'=>$request->idMember,
            'date'=>date('Y-m-d'),
            'file'=>$fileName
        ]);

        return back()->with('success','Sertifikat berhasil diupload');
    }

    public function reuploadCertificate(Certificate $id, Request $request){
        $request->validate([
            'file'=>'required|mimes:pdf,jpg,jpeg,png'
        ]); 
        unlink(public_path('file/sertifikat_peserta') . '/' . $id->file);
        $id->load('getMember');
        $fileName = null;
        if ($request->hasFile('file')) {
            $file = $request->file;
            $dest = 'file/sertifikat_peserta';
            $fileName = 'certificate' . '_' . $id->getMember->name . '_' .date("YmdHis") . auth()->user()->id .  "." . $file->getClientOriginalExtension();
            $file->move($dest, $fileName);
        }
        $id->update([
            'date'=>date('Y-m-d'),
            'file'=>$fileName
        ]);

        return back()->with('success','Sertifikat berhasil diupload');
    }

    public function getMyCertificate(){

    }
}
