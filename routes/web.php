<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CategoryController;


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




Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Dashboard Route
Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard');

// Logout Route
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/users', [UsersController::class, 'index'])->name('user.index');
Route::get('/user/create', [UsersController::class, 'create'])->name('user.create');
Route::post('/user', [UsersController::class, 'store'])->name('user.store');
Route::get('user/{id}/edit', [UsersController::class, 'edit'])->name('user.edit');
Route::put('user/{id}', [UsersController::class, 'update'])->name('user.update');
Route::delete('/user/destroy/{id}', [UsersController::class, 'destroy'])->name('user.destroy');



Route::get('/categories', [CategoryController::class, 'index'])->name('index');
Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('destroy');
