<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\ProgramController;

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

    //Provider
    Route::get('/providers', [ProviderController::class, 'getAll']);
    Route::post('/provider', [ProviderController::class, 'createNew']);

    //Lead
    Route::get('/leads', [LeadController::class, 'getAll']);
    Route::post('/lead', [LeadController::class, 'createNew']);

    //Program
    Route::get('/programs', [ProgramController::class, 'getAll']);
    Route::post('/program', [ProgramController::class, 'createNew']);

});

Route::get('/category/parents', [CategoryController::class, 'getAllParents']);
Route::get('/category/{id}/subcat', [CategoryController::class, 'getSubCatByID']);
Route::get('/countries', [CountryController::class, 'getAll']);

