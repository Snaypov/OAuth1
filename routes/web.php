<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialController;

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
    return view('welcome');
});


Route::get('/facebook/auth', [App\Http\Controllers\SocialController::class, 'redirect'])->name('auth.facebook');
Route::get('/facebook/auth/callback', [App\Http\Controllers\SocialController::class, 'callback']);


Route::get('/auth/google', [App\Http\Controllers\SocialController::class, 'redirectGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [App\Http\Controllers\SocialController::class, 'callbackGoogle']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
