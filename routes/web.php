<?php

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

Route::get('/home', 'HomeController@index')->name('home');
Route::namespace('Backend')->prefix('user')->name('user.')->group(function(){
    Route::get('/', 'UserController@index')->name('profile');
    Route::get('/edit', 'UserController@edit')->name('edit');
    Route::post('/update', 'UserController@update')->name('update');
});

//facebook login
//Route::prefix('facebook')->name('facebook.')->group( function(){
//    Route::get('auth', [FaceBookController::class, 'loginUsingFacebook'])->name('login');
//    Route::get('callback', [FaceBookController::class, 'handleFacebookCallback'])->name('callback');
//});

//google login
//Route::prefix('google')->name('google.')->group( function(){
//    Route::get('auth', [GoogleController::class, 'loginUsingGoogle'])->name('login');
//    Route::get('callback', [GoogleController::class, 'handleGoogleCallback'])->name('callback');
//});
