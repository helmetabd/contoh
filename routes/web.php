<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Models\Category;
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

Route::get('/blogs/create', [BlogController::class, 'create'])->name('blogs.create')->middleware('auth');

Route::get('/blogs/{blog}', [BlogController::class, 'show'])->name('blogs.detail');

Route::get('/dashboard', [BlogController::class, 'dashboard'])->middleware('auth');

Route::post('/blogs', [BlogController::class, 'store']);

Route::get('/blogs/{id}/edit', [BlogController::class, 'edit']);

Route::put('/blogs/{id}', [BlogController::class, 'update']);

Route::delete('/blogs/{id}', [BlogController::class, 'destroy'])->name('blogs.delete');

Route::get('/blogs/jajal/{id}', [BlogController::class, 'trying'])->name('blogs.trying');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
// Route::delete('/dashboard/{dashboard}', [BlogController::class, 'destroy']);

// Route::get('/login', [BlogController::class, 'login']);

// Route::get('/register', [BlogController::class, 'register']);

Route::get('/get-blog-by-categories', function(){
    $data = Category::with('blogs')->where('name', 'LIKE', '%Sport%')->get();
    return response()->json($data, 200);
});