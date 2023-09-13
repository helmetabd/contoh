<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Models\Category;
use Cviebrock\EloquentSluggable\Services\SlugService;
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

Route::get('/', [BlogController::class, 'index'])->name('home');

Route::get('/blogs/create', [BlogController::class, 'create'])->name('blogs.create')->middleware('auth');

Route::post('/blogs', [BlogController::class, 'store'])->name('blogs.store');

Route::get('/blogs/{id}/edit', [BlogController::class, 'edit'])->name('blogs.edit');

Route::put('/blogs/{id}', [BlogController::class, 'update'])->name('blogs.update');

Route::delete('/blogs/{id}', [BlogController::class, 'destroy'])->name('blogs.delete');

Route::get('/blogs/{blog}', [BlogController::class, 'show'])->name('blogs.detail');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index')->middleware('auth');

Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');

Route::post('/categories/new', [CategoryController::class, 'store'])->name('categories.store');

Route::get('/dashboard', [BlogController::class, 'dashboard'])->name('dashboard')->middleware('auth');

Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.delete');

Route::get('/blogs/jajal/{id}', [BlogController::class, 'trying'])->name('blogs.trying');

// Route::delete('/dashboard/{dashboard}', [BlogController::class, 'destroy']);

// Route::get('/login', [BlogController::class, 'login']);

// Route::get('/register', [BlogController::class, 'register']);

Route::get('/get-blog-by-categories', function($id){
    $data = Category::with('blogs')->where('name', 'LIKE', '%Sport%')->get();
    return response()->json($data, 200);
});

Route::get('/get-data-by-id', function($id){
    $data = Category::findOrFail($id)->get();
    return response()->json($data, 200);
})->name('get-data-by-id');

// Route::get('check_slug', function () {
//     $slug = SlugService::createSlug(Blog::class, 'slug', request('title'));
//     return response()->json(['slug' => $slug]); 
// });