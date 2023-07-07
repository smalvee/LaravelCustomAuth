<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;

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
    return view('welcome');
});

Route::get('/login', [CustomAuthController::class, 'login'])->middleware('alreadyloggedin');
Route::get('/create_user', [CustomAuthController::class, 'create_user']);
Route::get('/reg', [CustomAuthController::class, 'reg'])->middleware('alreadyloggedin');
Route::post('reg_user', [CustomAuthController::class, 'reg_user'])->name('reg_user');
Route::post('/login_user', [CustomAuthController::class, 'login_user'])->name('login_user');
Route::get('/logout', [CustomAuthController::class, 'logout']);
Route::get('/dashboard', [CustomAuthController::class, 'dashboard'])->middleware('isloggedIn');