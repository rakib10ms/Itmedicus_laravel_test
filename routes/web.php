<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Backend\CompanyController;
use App\Http\Controllers\Backend\EmployeeController;


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
    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //company resource route
    Route::resource('company', CompanyController::class);
    //employee resource route
      Route::resource('employee', EmployeeController::class);

      Route::get('/dashboard', function () {
        return view('layouts.backend.dashboard');
    }); 
 
});
