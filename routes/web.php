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

Route::get('login', [\App\Http\Controllers\AuthController::class, 'ShowLoginForm']) -> name('login');

Route::get('register', [\App\Http\Controllers\AuthController::class, 'ShowRegForm']) -> name('register');
Route::post('register_act', [\App\Http\Controllers\AuthController::class, 'Reg_act']) -> name('register_act');
