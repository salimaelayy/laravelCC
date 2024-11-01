<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikePostController;
use App\Http\Controllers\PostUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\auth\RegisterController;
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
    return view('home'); 
})->name('home') ;
Route ::get('/logout',[LogoutController::class,'store'])->name('logout');
Route ::get('/login',[LoginController::class,'index'])->name('login');
Route ::post('/login',[LoginController::class,'store']);
Route ::get('/register',[RegisterController::class,'index'])->name('register');
Route ::post('/register',[RegisterController::class,'store']);
Route ::get('/dashboard',[DashboardController::class,'index'])->name('dashboard')->middleware('auth');
Route ::get('/posts',[PostController::class,'index'])->name('posts');
Route ::post('/posts',[PostController::class,'store']);
Route ::get('/posts/{post}',[PostController::class,'show'])->name('posts.show');;
Route ::delete('/posts/{post}',[PostController::class,'Destroy'])->name('posts.Destroy');
Route ::post('/posts/{post}/likes',[LikePostController::class,'store'])->name('posts.likes');
Route ::delete('/posts/{post}/likes',[LikePostController::class,'Destroy'])->name('posts.likes');
Route ::get('/users/{user:username}/posts',[PostUserController::class,'index'])->name('users.posts');
