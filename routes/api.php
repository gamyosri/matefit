<?php

use App\Http\Controllers\AuthController;
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


Route::post('/signin', 'AuthController@signin')->name('signin');
Route::post('/login', 'AuthController@login')->name('login');
Route::get('/me',  'AuthController@me')->middleware('auth:sanctum')->name('me');
