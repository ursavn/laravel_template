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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index')->name('home');

Route::namespace('Backend')->group(function(){
    Route::get('/change-password', function () {
        return view('backend\user\change-password');
    })->name('get-change-password');
    Route::post('/change-password', 'ChangePasswordController@changePassword')->name('post-change-password');
});

Route::namespace('Backend')->prefix('users')->name('users.')->group(function(){
    Route::get('/{id}/change-password', function ($id) {
        return view('backend\users\change-password', compact('id'));
    })->name('get-change-password');
    Route::post('/{id}/change-password', 'UserController@changePassword')->name('post-change-password');
    Route::get('/', 'UserController@getUserList')->name('list');
    Route::get('/detail/{id}', 'UserController@getDetailUser')->name('detail');
    Route::get('/edit/{id}', 'UserController@editUser')->name('edit');
    Route::get('/create', 'UserController@create')->name('create');
    Route::post('/store', 'UserController@store')->name('store');
});

Route::namespace('Backend')->prefix('profile')->name('profile.')->group(function(){
    Route::get('/', 'UserController@index')->name('index');
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
