<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\LoginController; //== require
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CommentController;
use Laravel\Socialite\Facades\Socialite;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return 'we are in files';
    return view('welcome');
});

Route::get('/posts', [PostController::class, 'index'])->name('posts.index')->middleware('auth');
Route::get('/posts/create/', [PostController::class, 'create'])->name('posts.create')->middleware('auth');
Route::post('/posts',[PostController::class, 'store'])->name('posts.store')->middleware('auth');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit')->middleware('auth');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update')->middleware('auth');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show')->middleware('auth');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy')->middleware('auth');


//comments

Route::post('/comments', [CommentController::class, 'store'])->name('comments.store')->middleware('auth');
Route::get('/comments/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit')->middleware('auth');
Route::patch('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update')->middleware('auth');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy')->middleware('auth');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
});

Route::get('/auth/callback', function () {
    $user = Socialite::driver('github')->user();

    // $user->token
});

Route::get('auth/google', [LoginController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [LoginController::class, 'handleGoogleCallback']);
