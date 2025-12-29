<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MeController;
use App\Http\Controllers\MyPostController;
Route::get('/', function () {
    return view('welcome');
});
Route::middleware('guest')->group(function () {
    Route::view('/login', 'auth.login-page')->name('login');
    Route::view('/register', 'auth.signup-page')->name('register');
});
Route::get('/posts', [PostController::class,'index'])->name('posts');
Route::get('/posts/create', [PostController::class,'create'])->name('post.create');
Route::post('/posts/create',[PostController::class,'storePost'])->name('posts.store');
Route::get('/posts/{post}',[PostController::class,'show'])->name('posts.show');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
Route::middleware(['auth'])->group(function () {

    // Me page
    Route::get('/me', [MeController::class, 'index'])->name('me');

    // Update profile
    Route::get('/me/edit', [MeController::class, 'edit'])->name('me.edit');
    Route::put('/me', [MeController::class, 'update'])->name('me.update');

    // Delete account
    Route::delete('/me', [MeController::class, 'destroy'])->name('me.destroy');

    // My posts actions
    Route::get('/me/posts/{post}/edit', [MyPostController::class, 'edit'])->name('me.posts.edit');
    Route::put('/me/posts/{post}', [MyPostController::class, 'update'])->name('me.posts.update');
    Route::delete('/me/posts/{post}', [MyPostController::class, 'destroy'])->name('me.posts.destroy');
});
