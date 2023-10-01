<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('signin', [App\Http\Controllers\Auth\LoginController::class, 'show'])->name('signin');
Route::post('signin', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('signin');

Route::get('signup', [App\Http\Controllers\Auth\RegisterController::class, 'show'])->name('signup');
Route::post('signup', [App\Http\Controllers\Auth\RegisterController::class, 'store'])->name('register');

Route::post('/signout', 'App\Http\Controllers\Auth\LoginController@logout')->name('signout');


Route::group(["middleware" => "auth"], function() {
    Route::get('/', [App\Http\Controllers\FeedController::class, 'index'])->name('feed');

    Route::get('/timeline', [App\Http\Controllers\UserController::class, 'timeline'])->name("myTimeline");
    Route::get('/timeline/{username}', [App\Http\Controllers\UserController::class, 'timeline'])->name("timeline");
    Route::get('/chat', [App\Http\Controllers\MessageController::class, 'index'])->name("messages");
    Route::get('/explore', [App\Http\Controllers\FriendController::class, 'explore'])->name("find-friends");
    Route::get('/profile/edit', [App\Http\Controllers\UserController::class, 'edit'])->name("edit_profile");
    Route::put('/profile/edit', [App\Http\Controllers\UserController::class, 'update'])->name("update_profile");
});

