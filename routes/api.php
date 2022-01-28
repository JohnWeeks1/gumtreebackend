<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\AdController;
use App\Http\Controllers\Api\AdsByCategoryController;
use App\Http\Controllers\Api\AdsBySearchController;
use App\Http\Controllers\Api\AdsByUserIdController;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\MessageGroupsByUserIdController;
use App\Http\Controllers\Api\MessagesForASingleChatController;
use App\Http\Controllers\Api\UserController;
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


Route::get('ads', [AdController::class, 'index']);
Route::get('ads/{id}', [AdController::class, 'show']);
Route::put('ads/{id}', [AdController::class, 'update']);

Route::get('ads/category/{id}', [AdsByCategoryController::class, 'index']);
Route::get('categories', [CategoryController::class, 'index']);

Route::get('messages/user/{id}', [MessageGroupsByUserIdController::class, 'index']);

Route::get('search/ads/{location}', [AdsBySearchController::class, 'index']);


Route::middleware('auth:sanctum')->group(function () {

    Route::get('user', [UserController::class, 'index']);
    Route::put('user/{id}', [UserController::class, 'update']);

    Route::post('ads', [AdController::class, 'store']);
    Route::get('ads/user/{id}', [AdsByUserIdController::class, 'index']);

    Route::post('messages', [MessageController::class, 'store']);
    // Route::get('messages/user/{id}', [MessageGroupsByUserIdController::class, 'index']);
    Route::get('messages/{user_id}/{seller_id}/{ad_id}', [MessagesForASingleChatController::class, 'index']);

});
