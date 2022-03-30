<?php

use App\Http\Controllers\Auth\FaceBookController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//facebook login
//Route::prefix('facebook')->name('facebook.')->group( function(){
//    Route::get('auth', [FaceBookController::class, 'loginUsingFacebook'])->name('login');
//    Route::get('callback', [FaceBookController::class, 'handleFacebookCallback'])->name('callback');
//});

//google login
//Route::prefix('facebook')->name('facebook.')->group( function(){
//    Route::get('auth', [GoogleController::class, 'loginUsingGoogle'])->name('login');
//    Route::get('callback', [GoogleController::class, 'handleGoogleCallback'])->name('callback');
//});

Route::get('/change-password', function () {
    return view('user\change-password');
})->name('get-change-password');

Route::post('/change-password', [UserController::class, 'changePassword'])->name('post-change-password');

