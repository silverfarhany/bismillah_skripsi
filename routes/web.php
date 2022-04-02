<?php
// nouvos

use App\Models\Member;
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
use App\Models\Mentor;

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
Route::get('/home', [HomeController::class, 'home'])->name('home')->middleware('auth');
Route::get('/homepeserta', [HomeController::class, 'home'])->name('home')->middleware('auth');
Route::get('/logout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');
//Route::get('/', function() {return view('login');});

//Route::get('/home', function() {return view('pembimbing.index');});

Route::get('/creatementor',[MentorController::class, 'index'])->name('creatementor');
Route::post('/submitmentor',[MentorController::class, 'storeDataPost'])->name('storementor');
Route::get('/deleteMentor/{id}', [MentorController::class, 'delete'])->name('deleteMentor');
Route::get('/editMentor/{id}', [MentorController::class, 'edit']);
Route::post('/editMentor', [MentorController::class, 'update'])->name('editMentor');

Route::get('/createscore', [ScoreController::class, 'index'])->name('index');
Route::post('/submitscore', [ScoreController::class, 'CreateScore'])->name('createscore');
Route::get('/readscore', [ScoreController::class, 'read'])->name('readscore');
Route::get('/deleteScore/{id}', [ScoreController::class, 'delete'])->name('deleteScore');
Route::get('/editScore/{id}', [ScoreController::class, 'edit']);
Route::post('/editScore', [ScoreController::class, 'update'])->name('editScore');
// Route::get('/createscore', function () {return view('score.create');});

Route::get('/homepeserta', function () {return view('peserta.index');});
Route::get('/final', function () {return view('peserta.final');});
Route::get('/readmember', [MemberController::class, 'read']);
Route::get('/alldata', [MemberController::class, 'alldata']);
Route::get('/pengajuan', [MemberController::class, 'pengajuan']);
Route::get('/aktifasi', [MemberController::class, 'aktifasi']);
Route::get('/createmember', [MemberController::class,'index']);
Route::post('/submitmember', [MemberController::class,'storeDataPost'])->name('submitmember');
Route::get('/editMember/{id}', [MemberController::class, 'edit']);
Route::post('/editMember', [MemberController::class, 'update'])->name('editMember');

Route::get('/createdivision', [DivisionController::class, 'index'])->name('createdivision');
Route::post('/submitdivision', [DivisionController::class, 'storeDataPost'])->name('createdivision');
Route::get('/deleteDivision/{id}', [DivisionController::class, 'delete'])->name('deleteDivision');
Route::get('/editDivision/{id}', [DivisionController::class, 'edit']);
Route::post('/editDivision', [DivisionController::class, 'update'])->name('editDivision');

Route::get('/createtask', [TaskController::class, 'index'])->name('createtask');
Route::post('/submittask', [TaskController::class, 'CreateTask'])->name('createtask');
Route::get('/readalltask', [TaskController::class, 'index'])->name('index');
Route::get('/deleteTask/{id}', [TaskController::class, 'delete'])->name('deleteTask');
Route::get('/editTask/{id}', [TaskController::class, 'edit']);
Route::put('/update-task/{id}', [TaskController::class, 'update']);
Route::get('/readtask', [TaskController::class, 'read'])->name('read');

Route::get('/presence', [PresenceController::class, 'index']);
Route::post('/submitpresence', [PresenceController::class, 'submit'])->name('submit');
Route::get('/readpresensi', function () {return view('presensi.read');});
Route::get('/readallpresensi', function () {return view('presensi.readall');});

Route::get('/readkeagamaan', function () {return view('KR.readkeagamaan');});
Route::get('/readallkeagamaan', function () {return view('KR.readallkeagamaan');});
Route::get('/readkejasmanian', function () {return view('KR.readkejasmanian');});
Route::get('/readallkejasmanian', function () {return view('KR.readallkejasmanian');});
Route::get('/readsharingsession', function () {return view('KR.readsharingsession');});
Route::get('/readallsharingsession', function () {return view('KR.readallsharingsession');});