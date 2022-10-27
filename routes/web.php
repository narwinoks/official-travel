<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\SubmissionsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [AuthController::class,'login'])->name('login')->middleware('guest');

Route::controller(AuthController::class)->group(function(){
    Route::get('/login', 'login')->name('login')->middleware('guest');
    Route::post('/login', 'ProcessLogin')->name('login');
    Route::post('/logout', 'logout')->name('logout');
});
Route::resource('user', UserController::class)->middleware(['auth','role:admin']);
Route::resource('city', CityController::class)->middleware('auth');
Route::controller(DataController::class)->group(function(){
    Route::prefix('data')->group(function(){
        Route::get('/city','city')->name('data.city')->middleware('role:sdm');
        Route::get('/newsubmission','NewSubmission')->name('data.newsubmission')->middleware('role:sdm');
        Route::get('/allsubmission','HistorySubmission')->name('data.allsubmission')->middleware('role:sdm');
        Route::get('/mysubmission','MySubmission')->name('data.mysubmission');
    });
});
Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');
Route::middleware('auth')->controller(SubmissionsController::class)->prefix('submissions')->group(function(){
    Route::get('/history','HistorySubmission')->name('submission.history')->middleware('role:sdm');
    Route::get('/all','AllSubmissions')->name('submission.all')->middleware('role:sdm');
    Route::get('/','index')->name('submission.index')->middleware('role:pegawai');
    Route::get('/create','create')->name('submission.create');
    Route::get('/approve/{id}','Approve')->name('submission.approve')->middleware('role:sdm');
    Route::post('/approve','ApproveStore')->name('submission.approve.store')->middleware('role:sdm');
    Route::post('/store','store')->name('submission.store');
});
