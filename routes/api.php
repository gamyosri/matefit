<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\SearchController;
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


Route::post('/join', 'AuthController@join')->name('join');
Route::post('/login', 'AuthController@login')->name('login');
Route::get('/profile/{id}',  'AuthController@profile')->middleware('auth:sanctum');

Route::post('/activity/{id}/participate','ActivityController@participate')->middleware('auth:sanctum');
Route::post('/activity/{id}/cancel','ActivityController@cancel')->middleware('auth:sanctum');
Route::get('/activity/myactivities','ActivityController@myActivities')->middleware('auth:sanctum');
Route::apiResource('/activity','ActivityController')->middleware('auth:sanctum');

Route::get('/booking/trainer/pending','BookingController@PendingTrainerBookings')->middleware('auth:sanctum');
Route::get('/booking/mate/pending','BookingController@PendingMateBookings')->middleware('auth:sanctum');
Route::get('/booking/matebookings','BookingController@getMateBookings')->middleware('auth:sanctum');
Route::post('/booking/{id}/accept','BookingController@accept')->middleware('auth:sanctum');
Route::post('/booking/{id}/decline','BookingController@decline')->middleware('auth:sanctum');
Route::get('/booking/accepted','BookingController@getAcceptedBookings')->middleware('auth:sanctum');
Route::apiResource('/booking','BookingController')->middleware('auth:sanctum');


Route::post('/search','SearchController@searchActivities')->middleware('auth:sanctum');
Route::post('/searchtrainer','SearchController@searchTrainer')->middleware('auth:sanctum');
