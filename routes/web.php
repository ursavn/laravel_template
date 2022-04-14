<?php

use App\Http\Controllers\Auth\FaceBookController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Backend\ChangePasswordController;
use App\Http\Controllers\Backend\SendMailController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\HomeController;
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

Auth::routes(['verify' => true]);

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::namespace('Backend')->group(function(){
//    Route::get('/change-password', function () {
//        return view('backend\profile\change-password');
//    })->name('get-change-password');
    Route::post('/change-password', [ChangePasswordController::class, 'changePassword'])
        ->name('post-change-password');
    Route::get('send-mail-change-password', [SendMailController::class, 'index'])
        ->name('send-mail-change-password');
});

Route::namespace('Backend')->prefix('users')->name('users.')->group(function(){
    Route::get('/{id}/change-password', function ($id) {
        return view('backend\users\change-password', compact('id'));
    })->name('get-change-password');
    Route::post('/{id}/change-password', [UserController::class, 'changePassword'])->name('post-change-password');
    Route::get('/', [UserController::class, 'getUserList'])->name('list');
    Route::get('/detail/{id}', [UserController::class, 'getDetailUser'])->name('detail');
    Route::get('/edit/{id}', [UserController::class, 'editUser'])->name('edit');
    Route::post('/update/{id}', [UserController::class, 'updateUser'])->name('update');
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::post('/store', [UserController::class, 'store'])->name('store');
    Route::post('/active/{id}', [UserController::class, 'changeUserActiveStatus'])->name('active');
});

Route::namespace('Backend')->prefix('profile')->name('profile.')->group(function(){
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/edit', [UserController::class, 'edit'])->name('edit');
    Route::post('/update', [UserController::class, 'update'])->name('update');
});

Route::namespace('Backend')->prefix('setting')->name('setting.')->group(function(){
    Route::get('/', [SettingController::class, 'index'])->name('list');
    Route::post('/update/{id}', [UserController::class, 'update'])->name('update');
});

//facebook login
//Route::namespace('Backend')->prefix('facebook')->name('facebook.')->group( function(){
//    Route::get('auth', [FaceBookController::class, 'loginUsingFacebook'])->name('login');
//    Route::get('callback', [FaceBookController::class, 'handleFacebookCallback'])->name('callback');
//});

//google login
//Route::namespace('Backend')->prefix('google')->name('google.')->group( function(){
//    Route::get('auth', [GoogleController::class, 'loginUsingGoogle'])->name('login');
//    Route::get('callback', [GoogleController::class, 'handleGoogleCallback'])->name('callback');
//});
