<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/new/post', [postController::class, 'createPostPage'])->name('create.post');
Route::post('/create/post', [postController::class, 'createPost'])->name('posts.store');
Route::get('/post/{id}', [postController::class, 'postShow'])->name('show.post');
Route::delete('/delete/post/{id}', [postController::class, 'postDelete'])->name('delete.post');
Route::get('/update/post/{id}', [postController::class, 'updatePostPage'])->name('updatePage.post');
Route::post('/review/post/{id}', [postController::class, 'updatePost'])->name('posts.update');



Route::get('/dashboard', [postController::class, 'dashboard'] )->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
