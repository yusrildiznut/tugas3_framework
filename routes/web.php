<?php

use App\Http\Controllers\dashboardController;
use App\Http\Controllers\dosenController;
use App\Http\Controllers\mahasiswaController;
use App\Http\Controllers\matakuliahController;
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

Route::resource('/', dashboardController::class);
Route::resource('dosens', dosenController::class);
Route::resource('mahasiswas', mahasiswaController::class);
Route::resource('matakuliahs', matakuliahController::class);
Route::resource('dashboards', dashboardController::class);
Route::fallback(function() {
    return view('fail');
});