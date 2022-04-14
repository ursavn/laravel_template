<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
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
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
    Route::post('/change-password', [AuthController::class, 'changePassword']);
    Route::post('/update-user-profile', [AuthController::class, 'updateUserProfile']);
    Route::post('login-facebook', [AuthController::class, 'loginWithFacebook']);
    Route::post('login-google', [AuthController::class, 'loginWithGoogle']);
    Route::post('send-mail-change-password', [AuthController::class, 'sendMailChangePassword']);
    Route::post('confirm-otp', [AuthController::class, 'confirmOtp']);
    Route::post('reset-password', [AuthController::class, 'resetPassword']);
});

Route::group(['middleware' => 'api', 'prefix' => 'users'], function () {
    Route::get('/', [UserController::class, 'index']);
    Route::get('/{id}', [UserController::class, 'show']);
    Route::post('/store', [UserController::class, 'store']);
    Route::post('/update/{id}', [UserController::class, 'update']);
    Route::post('/change-password/{id}', [UserController::class, 'changePassword']);
    Route::post('/change-permission/{id}', [UserController::class, 'changePermission']);
    Route::post('/active/{id}', [UserController::class, 'active']);
});
