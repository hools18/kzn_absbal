<?php

use Illuminate\Http\Request;

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

Route::group(['namespace' => 'Api'], function () {
    Route::group(['namespace' => 'Auth'], function () {
        Route::post('register', 'RegisterController');
        Route::post('login', 'LoginController');
        Route::post('logout', 'LogoutController')->middleware('auth:api');
    });
});

Route::any('/create_user', [
    'as' => 'api.create_user',
    'uses' => 'Api\UserController@create_user',
]);
Route::any('/update_confirmation_date', [
    'as' => 'api.update_confirmation_date',
    'uses' => 'Api\UserController@update_confirmation_date',
]);

Route::any('/getUserData/{user_id}', [
    'as' => 'api.getUserData',
    'uses' => 'Api\UserController@getUserData',
]);


Route::middleware('auth:api')->any('/getPublicKey', [
    'as' => 'api.getPublicKey',
    'uses' => 'Api\UserController@getPublicKey',
]);
Route::middleware('auth:api')->any('/getNewNotice', [
    'as' => 'api.getNewNotice',
    'uses' => 'Api\NoticeController@getNewNotice',
]);
Route::middleware('auth:api')->any('/setStatusOperation', [
    'as' => 'api.setStatusOperation',
    'uses' => 'Api\NoticeController@setStatusOperation',
]);

Route::middleware('auth:api')->any('/getStatusNotice', [
    'as' => 'api.getStatusNotice',
    'uses' => 'Api\NoticeController@getStatusNotice',
]);

Route::middleware('auth:api')->any('/sendDataToCrypt', [
    'as' => 'api.sendDataToCrypt',
    'uses' => 'Api\NoticeController@sendDataToCrypt',
]);
