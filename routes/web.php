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
    return redirect('/dashboard');
});
//Auth
Auth::routes();
//dashboard
Route::get('/dashboard',              [HomeController::class,     'index'])->name('home');
//listing visitor
Route::get('/visitors',               [VisitorController::class,  'index'])->name('visitors');
//delete visitor
Route::post('delete/visitor',         [VisitorController::class,  'destroy'])->name('destroy');
//listing details visitor
Route::get('details/visitors',        [VisitorController::class,  'index'])->name('details');
//index link for tracking
Route::get('/tracking',               [TrackingController::class, 'index'])->name('tracking');
//link to track website
Route::get('/analytics/{tracking?}',  [TrackingController::class, 'getDataFromLink']);
