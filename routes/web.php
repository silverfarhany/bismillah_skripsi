<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;

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
Route::get('/home', [HomeController::class, 'home'])->name('home');

Route::get('/homepeserta', function () {return view('peserta.index');});
Route::get('/final', function () {return view('peserta.final');});
Route::get('/readmember', function () {return view('peserta.read');});

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