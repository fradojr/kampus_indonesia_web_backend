<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\AuthorsController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function(){
    Route::prefix('auth')->group(function(){
        Route::post('register', [AuthController::class, 'register']);
        Route::post('login', [AuthController::class, 'login']);
        Route::post('logout', [AuthController::class, 'logout']);
        Route::post('refresh', [AuthController::class, 'refresh']);
        Route::post('me', [AuthController::class, 'me']);
    });

    Route::middleware('jwt.verify')->group(function(){
        Route::apiResource('news', NewsController::class, [
            'as' => 'api'
        ]);
        Route::get('news/showTitle/{id}', [NewsController::class, 'showTitle']);
        Route::get('showTitleAll', [NewsController::class, 'showTitleAll']);

        Route::get('news/showContent/{id}', [NewsController::class, 'showContent']);
        Route::get('showContentAll', [NewsController::class, 'showContentAll']);

        Route::get('news/showPicture/{id}', [NewsController::class, 'showPicture']);
        Route::get('showPictureAll', [NewsController::class, 'showPictureAll']);

        Route::get('news/delete/{id}', [NewsController::class, 'destroy']);
    });
});