<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Task;
use App\Models\Member;
use App\Models\Mentor;
use App\Models\Presence;
use App\Models\DailyJournal;
use App\Models\FormEvaluation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use App\Http\Controllers\HomeController;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        if (Session::get('roll') == 2) {
            $journalDate = DailyJournal::select('date')->where('member_id',$request->session()->get('id'))->groupBy('date')->get();
            $myMember = Member::where('email', Auth::User()->email)->first();
            $presensiNow = Presence::where('members_id', $myMember->id)->where('date', date('Y-m-d'))->first();
            $cekStatus = FormEvaluation::where('member_id',$request->session()->get('id'))->get();
            // dd($cekStatus);
            return view('peserta.index', compact('presensiNow','journalDate','cekStatus'));
        } elseif (Session::get('roll') == 1 || Session::get('roll') == 3) {
            $pengajuan = Member::where('submission_status', 'Pending')->count();
            $peserta = Member::where('is_aktif', 1)->count();
            $mentor = Mentor::all()->first();
            $members = Member::select('id', 'name')->get();
            $tasks = Task::with('getMember')->where('mentors_id',$request->session()->get('id'))->get();
            $journals = DailyJournal::with('getMember')->where('status',0)->get();
            return view('pembimbing.index')->with(compact('mentor', 'members', 'tasks', 'pengajuan', 'peserta','journals'));
        } else {
            return view('login');
        }

        // $members = Member::select('id','name')->get();
        // $tasks = Task::all();
        // return view('pembimbing.index', compact('tasks','members'));
    }
}
