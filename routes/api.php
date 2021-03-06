<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Middleware\CheckStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => 'api', 'prefix' => 'auth'], function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::post('login-facebook', [AuthController::class, 'loginWithFacebook']);
    Route::post('login-google', [AuthController::class, 'loginWithGoogle']);
    Route::post('send-mail-change-password', [AuthController::class, 'sendMailChangePassword']);
    Route::post('confirm-otp', [AuthController::class, 'confirmOtp']);
    Route::post('reset-password', [AuthController::class, 'resetPassword']);
});

Route::middleware([CheckStatus::class])->group(function(){
    Route::group(['middleware' => 'api', 'prefix' => 'users'], function () {
        Route::group(['middleware' => ['role:super-admin|admin']], function() {
            Route::get('/', [UserController::class, 'index']);
            Route::get('/show', [UserController::class, 'show']);
            Route::post('/store', [UserController::class, 'store']);
            Route::post('/update', [UserController::class, 'update']);
            Route::post('/change-password', [UserController::class, 'changePassword']);
            Route::post('/change-permission', [UserController::class, 'changePermission']);
            Route::post('/active', [UserController::class, 'active']);
        });
    });
    Route::group(['middleware' => 'api', 'prefix' => 'auth'], function () {
        Route::get('/user-profile', [AuthController::class, 'userProfile']);
        Route::post('/change-password', [AuthController::class, 'changePassword']);
        Route::post('/update-user-profile', [AuthController::class, 'updateUserProfile']);
    });
});
