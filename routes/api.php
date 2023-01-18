<?php

use App\Http\Controllers\Api\User\PostController;
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

Route::get('/user/home', function (Request $request) {
    return "User";
});

//Route::middleware('auth:api')->get('/user/post/get-posts', [Api\User\PostController::class, 'index']);

Route::middleware('auth:api')->get('/user/post/get-post/{id}', [Api\User\PostController::class, 'index']);

Route::get('/user/post/get-posts', 'Api\User\PostController@index')->name('posts');

