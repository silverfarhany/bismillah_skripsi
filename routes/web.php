<?php
// nouvos

use App\Http\Controllers\CertificateController;
use App\Models\Member;
use App\Models\Mentor;
use App\Models\DailyJournal;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\PresenceController;
use App\Http\Controllers\DailyJournalController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');
Route::get('/regis', [RegisController::class, 'regis'])->name('regis');
Route::post('actionregis', [RegisController::class, 'actionregis'])->name('actionregis');
Route::get('/pengajuanKP', [MemberController::class, 'submissionKP']);
Route::post('/pengajuanKP', [MemberController::class, 'submitKP']);

Route::group(['middleware' => ['hr']], function () {
    Route::get('/pengajuan', [MemberController::class, 'pengajuan']);
    Route::get('/aktifasi', [MemberController::class, 'aktifasi']);
    Route::patch('/submition/{id}/reject', [MemberController::class, 'rejectSubmition']);
    Route::patch('/submition/{id}/accept', [MemberController::class, 'acceptSubmition']);
    Route::patch('/submition/{id}/activate', [MemberController::class, 'activatePeserta']);
    Route::get('/creatementor', [MentorController::class, 'index'])->name('creatementor');
    Route::post('/submitmentor', [MentorController::class, 'storeDataPost'])->name('storementor');
    Route::get('/deleteMentor/{id}', [MentorController::class, 'delete'])->name('deleteMentor');
    Route::get('/editMentor/{id}', [MentorController::class, 'edit']);
    Route::patch('/updateMentor/{mentor}', [MentorController::class, 'update'])->name('editMentor');
    Route::get('/mentor/export', [MentorController::class, 'export']);
    Route::get('/sertifikat/upload', [CertificateController::class, 'formUpload']);
    Route::post('/sertifikat/upload', [CertificateController::class, 'uploadCertificate']);
    Route::post('/sertifikat/{id}', [CertificateController::class, 'getMyCertificate']);
    Route::patch('/sertifikat/{id}/reupload', [CertificateController::class, 'reuploadCertificate']);
    Route::get('/createdivision', [DivisionController::class, 'index'])->name('createdivision');
    Route::post('/submitdivision', [DivisionController::class, 'storeDataPost'])->name('createdivision');
    Route::get('/deleteDivision/{id}', [DivisionController::class, 'delete'])->name('deleteDivision');
    Route::get('/editDivision/{id}', [DivisionController::class, 'edit']);
    Route::patch('/editDivision/{division}', [DivisionController::class, 'update'])->name('editDivision');
});

Route::group(['middleware' => ['peserta']], function () {
    Route::get('/homepeserta', [HomeController::class, 'home'])->name('home')->middleware('auth');
    Route::get('/readpresensi', [PresenceController::class, 'getMyPresence']);
    Route::post('/startAbsensi', [PresenceController::class, 'startPresence']);
    Route::post('/finishAbsensi', [PresenceController::class, 'finishPresence']);
    Route::get('/readtask', [TaskController::class, 'read'])->name('read');
    Route::get('/task/notSubmitted', [TaskController::class, 'getNotSubmmitedTask']);
    Route::get('/submitTask/{id}', [TaskController::class, 'submitTask']);
    Route::post('/submitTask/{id}', [TaskController::class, 'storeSubmitTask']);
    Route::post('/dailyJournal', [DailyJournalController::class, 'store']);
    Route::get('/dailyJournal/journalToday', [DailyJournalController::class, 'journalToday']);
    Route::delete('/taskFile/{id}', [TaskController::class, 'deleteFile']);
    Route::delete('/dailyJournal/{id}', [DailyJournalController::class, 'delete']);
    Route::get('/final', [ScoreController::class, 'nilaiPeserta']);
});

Route::group(['middleware' => ['mentor']], function () {
    Route::get('/alldata', [MemberController::class, 'alldata']);
    Route::get('/member/{id}/jurnalHarian', [DailyJournalController::class, 'getMemberJournal']);
    Route::get('/member/export', [MemberController::class, 'export']);
    Route::get('/presensi/export', [PresenceController::class, 'export']);
    Route::get('/presensiMember/{id}', [PresenceController::class, 'getMemberPresence']);
    Route::get('/createtask', [TaskController::class, 'create'])->name('createtask');
    Route::post('/submittask', [TaskController::class, 'CreateTask'])->name('createtask');
    Route::get('/task/{id}/edit', [TaskController::class, 'edit']);
    Route::put('/task/{id}', [TaskController::class, 'update']);
    Route::patch('/task/{id}/approve', [TaskController::class, 'ApproveTask']);
    Route::patch('/task/{id}/revisi', [TaskController::class, 'RevisionTask']);
    Route::delete('/task/{id}', [TaskController::class, 'delete']);
    Route::get('/task/{id}/getFile', [TaskController::class, 'getTaskFile']);
    Route::get('/deleteTask/{id}', [TaskController::class, 'delete'])->name('deleteTask');
    Route::get('/task/export', [TaskController::class, 'export']);
    Route::get('/tugasMember/{id}', [TaskController::class, 'getMemberTask']);
    Route::get('/createscore', [ScoreController::class, 'index'])->name('index');
    Route::post('/submitscore', [ScoreController::class, 'CreateScore'])->name('createscore');
    Route::get('/readscore', [ScoreController::class, 'read'])->name('readscore');
    Route::get('/deleteScore/{id}', [ScoreController::class, 'delete'])->name('deleteScore');
    Route::get('/editScore/{id}', [ScoreController::class, 'edit']);
    Route::post('/editScore', [ScoreController::class, 'update'])->name('editScore');
    Route::get('/score/{form}/detail', [ScoreController::class, 'getScorebyForm']);
    Route::get('/score/export', [ScoreController::class, 'export']);
    Route::patch('/dailyJournal/{id}/approve', [DailyJournalController::class, 'Approve']);
    Route::patch('/dailyJournal/{id}/reject', [DailyJournalController::class, 'reject']);
    Route::get('/dailyJournal/{id}/export', [DailyJournalController::class, 'export']);
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [HomeController::class, 'home'])->name('home')->middleware('auth');
    Route::get('/editProfile', [LoginController::class, 'editProfile']);
    Route::patch('/editProfile/{id}', [LoginController::class, 'updateProfile']);
    Route::get('/dataDiri/{id}', [MemberController::class, 'dataDiri']);
    Route::get('/logout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');
});

    // Route::get('/readkeagamaan', function () {
    //     return view('KR.readkeagamaan');
    // });
    // Route::get('/readallkeagamaan', function () {
    //     return view('KR.readallkeagamaan');
    // });
    // Route::get('/readkejasmanian', function () {
    //     return view('KR.readkejasmanian');
    // });
    // Route::get('/readallkejasmanian', function () {
    //     return view('KR.readallkejasmanian');
    // });
    // Route::get('/readsharingsession', function () {
    //     return view('KR.readsharingsession');
    // });
    // Route::get('/readallsharingsession', function () {
    //     return view('KR.readallsharingsession');
    // });

    //Route::get('/home', function() {return view('pembimbing.index');});

    // Route::get('/readallpresensi', function () {
    //     return view('presensi.readall');
    // });

     // Route::get('/readmember', [MemberController::class, 'read']);
    // Route::get('/createmember', [MemberController::class, 'index']);
    // Route::post('/submitmember', [MemberController::class, 'storeDataPost'])->name('submitmember');
    // Route::get('/editMember/{id}', [MemberController::class, 'edit']);
    // Route::post('/editMember', [MemberController::class, 'update'])->name('editMember');

    // Route::get('/readalltask', [TaskController::class, 'index'])->name('index');

    // Route::get('/presence', [PresenceController::class, 'index']);

    // Route::post('/submitpresence', [PresenceController::class, 'submit'])->name('submit');
    
    // Route::get('/dailyJournal', [DailyJournalController::class, 'index']);

    // Route::get('/dailyJournal/{id}', [DailyJournalController::class, 'getDailyJournal']);


