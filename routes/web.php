<?php

use Illuminate\Support\Facades\Route;

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



Auth::routes();

Route::get('/', [App\Http\Controllers\FeedController::class, 'index'])->name('feed');
Route::get('/timeline', [App\Http\Controllers\UserController::class, 'index'])->name("timeline");
Route::get('/chat', [App\Http\Controllers\MessageController::class, 'index'])->name("messages");
Route::get('/explore', [App\Http\Controllers\FriendController::class, 'index'])->name("explore");
