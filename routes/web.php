<?php

use App\Http\Controllers\BlogController;
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

// Auth::routes();

Route::get('/', [BlogController::class, 'index']);

Route::get('/blogs/{blog}', [BlogController::class, 'show'])->name('blogs.detail');

Route::get('/dashboard', [BlogController::class, 'dashboard'])->middleware('auth');

Route::delete('/blogs/{id}', [BlogController::class, 'destroy'])->name('blogs.delete');

Route::get('/blogs/jajal/{id}', [BlogController::class, 'trying'])->name('blogs.trying');

// Route::delete('/dashboard/{dashboard}', [BlogController::class, 'destroy']);

// Route::get('/login', [BlogController::class, 'login']);

// Route::get('/register', [BlogController::class, 'register']);