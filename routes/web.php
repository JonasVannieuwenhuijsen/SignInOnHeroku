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


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Google

Route::prefix('google')->name('google.')->group( function(){
    Route::get('login', [App\Http\Controllers\GoogleController::class, 'loginWithGoogle'])->name('login');
    Route::any('callback', [App\Http\Controllers\GoogleController::class, 'callbackFromGoogle'])->name('callback');
});

// Facebook

Route::prefix('facebook')->name('facebook.')->group( function(){
    Route::get('login', [App\Http\Controllers\FacebookController::class, 'loginWithFacebook'])->name('login');
    Route::any('callback', [App\Http\Controllers\FacebookController::class, 'callbackFromFacebook'])->name('callback');
});

// Github

Route::prefix('github')->name('github.')->group( function(){
    Route::get('login', [App\Http\Controllers\GithubController::class, 'loginWithGithub'])->name('login');
    Route::any('callback', [App\Http\Controllers\GithubController::class, 'callbackFromGithub'])->name('callback');
});

