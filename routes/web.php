<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProfileController;
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


Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');


Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Dashboard Route
Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/users', [UsersController::class, 'index'])->name('user.index');
Route::get('/user/create', [UsersController::class, 'create'])->name('user.create');
Route::post('/user', [UsersController::class, 'store'])->name('user.store');
Route::get('user/{id}/edit', [UsersController::class, 'edit'])->name('user.edit');
Route::put('user/{id}', [UsersController::class, 'update'])->name('user.update');
Route::delete('/user/destroy/{id}', [UsersController::class, 'destroy'])->name('user.destroy');
Route::get('/user/{id}', [UsersController::class, 'show'])->name('user.show');
Route::get('/user', [UsersController::class, 'display'])->name('user.display');


Route::get('/categories', [CategoryController::class, 'index'])->name('index');
Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('destroy');

Route::get('/project', [ProjectController::class, 'index'])->name('projects.index');

Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
Route::delete('/projects/destroy/{id}', [ProjectController::class, 'destroy'])->name('projects.destroy');
Route::get('projects/{id}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
Route::put('projects/{id}', [ProjectController::class, 'update'])->name('projects.update');
Route::get('/projects/{id}', [ProjectController::class, 'show'])->name('projects.show');
Route::get('/projects', [ProjectController::class, 'display'])->name('projects.display');