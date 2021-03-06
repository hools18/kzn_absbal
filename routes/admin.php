<?php
Route::group([
    'domain' => 'admin.' . env('APP_DOMAIN'),
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
        Route::group([
            'as' => 'applications.',
            'prefix' => 'applications',
        ], function () {
            Route::get('/', [
                'as' => 'index',
                'uses' => 'ApplicationController@index',
            ]);
            Route::put('/accept', [
                'as' => 'accept',
                'uses' => 'ApplicationController@accept',
            ]);
            Route::put('/reject', [
                'as' => 'reject',
                'uses' => 'ApplicationController@reject',
            ]);
        });
        Route::group([
            'as' => 'users.',
            'prefix' => 'users',
        ], function () {
            Route::get('/', [
                'as' => 'index',
                'uses' => 'UserController@index',
            ]);
            Route::get('/create', [
                'as' => 'create',
                'uses' => 'UserController@create',
            ]);
        });

    });

    Route::group([
        'as' => 'user_interface.',
        'namespace' => 'UserInterface',
        'prefix' => 'user_interface',
    ], function () {
        Route::group([
            'as' => 'users.',
            'prefix' => 'users',
        ], function () {
            Route::get('/', [
                'as' => 'index',
                'uses' => 'UserController@index',
            ]);
        });

    });
});
