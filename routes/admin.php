<?php
Route::group([
    'domain' => 'admin.'.env('APP_DOMAIN'),
    'as' => 'admin.',
    'namespace' => 'Admin',
    'middleware' => [
        'bindings',
//        'auth',
    ],
], function () {
    Route::get('/', [
        'as' => 'index',
        'uses' => 'MainController@index',
    ]);
    Route::get('/test', [
        'as' => 'index',
        'uses' => 'MainController@test',
    ]);
    Route::group([
        'as' => 'private.',
        'namespace' => 'PrivateInterface',
        'prefix' => 'private',
    ], function () {
        Route::get('/applications', [
            'as' => 'applications',
            'uses' => 'ApplicationController@applications',
        ]);
        Route::get('/users', [
            'as' => 'users',
            'uses' => 'ApplicationController@users',
        ]);
    });
});
