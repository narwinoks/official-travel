<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\SubmissionsController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::controller(AuthController::class)->group(function(){
    Route::get('/login', 'login')->name('login')->middleware('guest');
    Route::post('/login', 'ProcessLogin')->name('login');
    Route::post('/logout', 'logout')->name('logout');
});
Route::resource('city', CityController::class)->middleware('auth');
Route::controller(DataController::class)->group(function(){
    Route::prefix('data')->group(function(){
        Route::get('/city','city')->name('data.city');
        Route::get('/newsubmission','NewSubmission')->name('data.newsubmission');
        Route::get('/allsubmission','HistorySubmission')->name('data.allsubmission');
        Route::get('/mysubmission','MySubmission')->name('data.mysubmission');
    });
});
Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');
Route::middleware('auth')->controller(SubmissionsController::class)->prefix('submissions')->group(function(){
    Route::get('/history','HistorySubmission')->name('submission.history');
    Route::get('/all','AllSubmissions')->name('submission.all');
    Route::get('/','index')->name('submission.index');
    Route::get('/create','create')->name('submission.create');
    Route::get('/approve/{id}','Approve')->name('submission.approve');
    Route::post('/store','store')->name('submission.store');
});
