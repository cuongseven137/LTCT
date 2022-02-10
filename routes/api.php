<?php

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

Route::group(['prefix'=>'product/{id}'],function(){
    Route::get('comment','App\Http\Controllers\API\CommentController@show');

    Route::post('comment','App\Http\Controllers\API\CommentController@store');

    Route::get('insurance','App\Http\Controllers\API\WarrantyController@show');
});

Route::delete('comment/{id}','App\Http\Controllers\API\CommentController@destroy');

Route::get('feedbacks','App\Http\Controllers\API\FeedbackController@index');

Route::get('feedback/{id}','App\Http\Controllers\API\FeedbackController@show');

Route::post('feedback','App\Http\Controllers\API\FeedbackController@store');




