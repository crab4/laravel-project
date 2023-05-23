<?php

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
  return view('welcome');
});
Route::get('/posts/index', [\App\Http\Controllers\PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [\App\Http\Controllers\PostController::class, 'create'])->name('posts.create');
Route::post('/posts/store', [\App\Http\Controllers\PostController::class, 'store'])->name('post.store');
Route::get('/posts/{post}', [\App\Http\Controllers\PostController::class, 'show'])->name('posts.show');
Route::get('/posts/{post}/edit', [\App\Http\Controllers\PostController::class, 'edit'])->name('posts.edit');
Route::patch('/posts/{post}', [\App\Http\Controllers\PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{post}/', [\App\Http\Controllers\PostController::class, 'destroy'])->name('posts.destroy');

Route::get('/categories/index',[\App\Http\Controllers\CategoryController::class, 'index'])->name('categories.index');


Route::get('/main', [\App\Http\Controllers\MainController::class, 'index'])->name('main.index');
Route::get('/about', [\App\Http\Controllers\AboutController::class, 'index'])->name('about.index');
Route::get('/contact', [\App\Http\Controllers\ContactController::class, 'index'])->name('contact.index');
Route::get('/pricing', [\App\Http\Controllers\PricingController::class, 'index'])->name('pricing.index');