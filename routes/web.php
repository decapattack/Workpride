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
    return view('home');
});

//Lista todos os posts
Route::get('/blog', [PostController::class, 'index'])->name('posts.index');

Route::get('/blog/criar', [PostController::class, 'create'])->name('posts.create');

Route::post('/blog', [PostController::class, 'store'])->name('posts.store');

Route::get('/blog/{post}',[PostController::class, 'show'] )->name('posts.show');
