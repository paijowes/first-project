<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('layouts.home');
});

Route::get('/home', function () {
    return view('layouts.home');
});

Route::get('/employees/add', function () {
    return view('employees.formadd');
});

Route::resource('employees', EmployeeController::class);
