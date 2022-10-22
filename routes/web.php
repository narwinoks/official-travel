<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DataController;
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

Route::get('/login',[ AuthController::class,'Login'])->name('login');
Route::post('/login',[ AuthController::class, 'ProcessLogin'])->name('login');
Route::resource('city', CityController::class);
Route::controller(DataController::class)->group(function(){
    Route::prefix('data')->group(function(){
        Route::get('/city','city')->name('data.city');
    });
});
