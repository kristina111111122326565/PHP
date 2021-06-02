<?php

use Illuminate\Http\Request;
use app\Http\Middleware;
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

Route::post("/signup","UserController@signUp");
Route::post("/signin/","UserController@signIn");
Route::post("/output/","UserController@output");
Route::post("/reset_password/","UserController@reset_password");
Route::post("/add/","ProductController@add");
Route::post("/renewal/","ProductController@renewal");
Route::post("/delete/","ProductController@delete");