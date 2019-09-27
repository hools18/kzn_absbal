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
});
