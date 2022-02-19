<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\DivisionController;
use App\Models\Member;

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

// Route::get('/', [LoginController::class, 'login'])->name('login');
// Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');
// Route::get('home', [HomeController::class, 'index'])->name('home')->middleware('auth');
// Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');
Route::get('/', function() {return view('login');});

Route::get('/home', function() {return view('pembimbing.index');});
Route::get('/creatementor',[MentorController::class, 'index'])->name('creatementor');
Route::post('/submitmentor',[MentorController::class, 'storeDataPost'])->name('storementor');

Route::get('/createscore', function () {return view('score.create');});

Route::get('/homepeserta', function () {return view('peserta.index');});
Route::get('/final', function () {return view('peserta.final');});
Route::get('/readmember', function () {return view('peserta.read');});
Route::get('/createmember', [MemberController::class,'index']);
Route::post('/submitmember', [MemberController::class,'storeDataPost'])->name('submitmember');
Route::get('/editMember/{id}', [MemberController::class, 'edit']);
Route::post('/editMember', [MemberController::class, 'update'])->name('editMember');

Route::get('/createdivision', [DivisionController::class, 'index'])->name('createdivision');
Route::post('/submitdivision', [DivisionController::class, 'storeDataPost'])->name('createdivision');
Route::get('/deleteDivision/{id}', [DivisionController::class, 'delete'])->name('deleteDivision');
Route::get('/editDivision/{id}', [DivisionController::class, 'edit']);
Route::post('/editDivision', [DivisionController::class, 'update'])->name('editDivision');


Route::get('/readtask', function () {return view('task.read');});
Route::get('/readalltask', function () {return view('task.readall');});

Route::get('/readpresensi', function () {return view('presensi.read');});
Route::get('/readallpresensi', function () {return view('presensi.readall');});

Route::get('/readkeagamaan', function () {return view('KR.readkeagamaan');});
Route::get('/readallkeagamaan', function () {return view('KR.readallkeagamaan');});
Route::get('/readkejasmanian', function () {return view('KR.readkejasmanian');});
Route::get('/readallkejasmanian', function () {return view('KR.readallkejasmanian');});
Route::get('/readsharingsession', function () {return view('KR.readsharingsession');});
Route::get('/readallsharingsession', function () {return view('KR.readallsharingsession');});