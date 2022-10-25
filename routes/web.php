<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CityController;
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
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'ProcessLogin')->name('login');
});
Route::resource('city', CityController::class);
Route::controller(DataController::class)->group(function(){
    Route::prefix('data')->group(function(){
        Route::get('/city','city')->name('data.city');
        Route::get('/newsubmission','NewSubmission')->name('data.newsubmission');
        Route::get('/allsubmission','HistorySubmission')->name('data.allsubmission');
    });
});
Route::controller(SubmissionsController::class)->prefix('submissions')->group(function(){
    Route::get('/','index')->name('submission.index');
});
