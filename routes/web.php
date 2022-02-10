<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('comment', 'App\Http\Controllers\CommentController@getComment');

Route::post('comment', 'App\Http\Controllers\CommentController@postComment');

Route::get('feedback','App\Http\Controllers\FeedbackController@getFeedback');

Route::post('feedback','App\Http\Controllers\FeedbackController@postFeedback');

Route::get('question',function(){
    return view('question');
});

Route::get('warranty/{id}','App\Http\Controllers\WarrantyController@getWarranty');

Route::get('warrantyForm','App\Http\Controllers\WarrantyController@getWarrantyForm');

Route::post('warrantyForm','App\Http\Controllers\WarrantyController@postWarrantyForm');

Route::get('onlineSupport','App\Http\Controllers\OnlineSupportController@getOnlineSupport');

Route::post('onlineSupport','App\Http\Controllers\OnlineSupportController@postOnlineSupport');

Route::get('returnProduct','App\Http\Controllers\ReturnProductController@getReturnProduct');

Route::post('returnProduct','App\Http\Controllers\ReturnProductController@postReturnProduct');