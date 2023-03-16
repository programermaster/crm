<?php

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

Auth::routes(['reset' => false, 'register' => false]);

Route::group(['middleware' => ['auth']], function () {
    Route::resource('clients', App\Http\Controllers\ClientController::class);
    Route::get('/report', [App\Http\Controllers\ReportController::class, 'index'])->name('report.index');
    Route::get('/report/export', [App\Http\Controllers\ReportController::class, 'export'])->name('report.export');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
