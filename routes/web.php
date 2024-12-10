<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/login', [UserController::class, "loginPage"]);
Route::get('/registration', [UserController::class, "registrationPage"]);

Route::post('/user-registration', [UserController::class, 'registration']);
Route::post('/user-login', [UserController::class, 'login']);
