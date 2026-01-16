<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\PostController;
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

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::group(['namespace' => 'Api'], function () {
        Route::apiResource('posts', 'PostController')->except('index', 'destroy');
        Route::apiResource('news', 'NewsController')->except('index', 'destroy');

        Route::get('/comments', [CommentController::class, 'index']);
        Route::get('/comments/{id}', [CommentController::class, 'show']);
        Route::post('/comments', [CommentController::class, 'store']);
        Route::put('/comments/{id}', [CommentController::class, 'update']);
        Route::delete('/comments/{id}', [CommentController::class, 'destroy']);
        Route::post('/comments/{id}', [CommentController::class, 'reply']);
    });
    Route::post('/logout', [AuthController::class, 'logout']);
});
