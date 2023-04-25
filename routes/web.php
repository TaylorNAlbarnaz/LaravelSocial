<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UserPostsController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('/posts', [PostsController::class, 'index'])->name("posts");
Route::post('/posts', [PostsController::class, 'store']);
Route::delete('/posts/{post}', [PostsController::class, 'destroy'])->name("posts.destroy");

Route::post('/posts/{post}/likes', [PostLikeController::class, 'store'])->name("posts.like");
Route::delete('/posts/{post}/likes', [PostLikeController::class, 'destroy'])->name("posts.like");

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/users/{user:username}/posts', [UserPostsController::class, 'index'])->name('user.posts');