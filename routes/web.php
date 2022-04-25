<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Backend\CompanyController;


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
    return view('auth.login');
});


Auth::routes();




Route::middleware('auth')->group(function () {
    //company resource route
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('company', [App\Http\Controllers\Backend\CompanyController::class, 'index']);
    Route::get('/company/create', [App\Http\Controllers\Backend\CompanyController::class, 'create']);

    Route::get('/dashboard', function () {
        return view('layouts.backend.masterbackend');
    });
});
