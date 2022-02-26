<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\TrackingController;

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

Auth::routes();

Route::get('/home',     [HomeController::class, 'index'])->name('home');
Route::get('/visitors', [VisitorController::class, 'index'])->name('visitors');
Route::get('/tracking', [TrackingController::class, 'index'])->name('tracking');
Route::post('/analytics/{tracking?}', [TrackingController::class, 'getDataFromLink'])->name('tracking');
