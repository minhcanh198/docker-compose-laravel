<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CountryController;

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
Route::post('/login', [LoginController::class, 'login']);
Route::post('/send-reset-link-email', [ForgotPasswordController::class, 'sendResetLinkEmail']);

Route::group(['middleware' => ['auth:api']], function () {
    Route::post('/user', [UserController::class, 'addUser']);
    Route::get('/users', [UserController::class, 'getAllUsers']);
    Route::get('/user/{id}', [UserController::class, 'getUserByID']);
    Route::get('/me', [UserController::class, 'aboutMe']);
    Route::post('/logout', [LoginController::class, 'logout']);
});

Route::get('/category/parents', [CategoryController::class, 'getAllParents']);
Route::get('/category/{id}/subcat', [CategoryController::class, 'getSubCatByID']);
Route::get('/countries', [CountryController::class, 'getAll']);

