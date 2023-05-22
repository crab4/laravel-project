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

Route::get('/posts/create', [\App\Http\Controllers\PostController::class, 'create'])->name('posts.create');
Route::get('/posts/read', [\App\Http\Controllers\PostController::class, 'read'])->name('posts.read');
Route::get('/posts/update', [\App\Http\Controllers\PostController::class, 'update'])->name('posts.update');
Route::get('/posts/delete', [\App\Http\Controllers\PostController::class, 'delete'])->name('posts.delete');

Route::get('/main', [\App\Http\Controllers\MainController::class, 'index'])->name('main.index');
Route::get('/about', [\App\Http\Controllers\AboutController::class, 'index'])->name('about.index');
Route::get('/contact', [\App\Http\Controllers\ContactController::class, 'index'])->name('contact.index');
Route::get('/pricing', [\App\Http\Controllers\PricingController::class, 'index'])->name('pricing.index');