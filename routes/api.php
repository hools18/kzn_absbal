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

Route::get('/create_user', [
    'as' => 'api.create_user',
    'uses' => 'Api\UserController@create_user',
]);
Route::get('/update_confirmation_date', [
    'as' => 'api.update_confirmation_date',
    'uses' => 'Api\UserController@update_confirmation_date',
]);
