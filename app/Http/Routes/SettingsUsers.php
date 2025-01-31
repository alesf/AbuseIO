<?php

use Illuminate\Support\Facades\Route;

Route::model('users', 'AbuseIO\Models\User', function () {
    throw new \Illuminate\Database\Eloquent\ModelNotFoundException('User Not Found.');
});

Route::resource('users', 'UsersController');

Route::group(
    [
        'prefix' => 'users',
        'as'     => 'users.',
    ],
    function () {
        // Search users
        Route::get(
            'search/{one?}/{two?}/{three?}',
            [
                'middleware' => 'permission:users_view',
                'as'         => 'search',
                'uses'       => 'UsersController@search',
            ]
        );

        // Access to index list
        Route::get(
            '',
            [
                'middleware' => 'permission:users_view',
                'as'         => 'index',
                'uses'       => 'UsersController@index',
            ]
        );

        // Access to show object
        Route::get(
            '{users}',
            [
                'middleware' => 'permission:users_view',
                'as'         => 'show',
                'uses'       => 'UsersController@show',
            ]
        );

        // Access to export object
        Route::get(
            'export/{format}',
            [
                'middleware' => 'permission:users_export',
                'as'         => 'export',
                'uses'       => 'UsersController@export',
            ]
        );

        // Access to create object
        Route::get(
            'create',
            [
                'middleware' => 'permission:users_create',
                'as'         => 'create',
                'uses'       => 'UsersController@create',
            ]
        );
        Route::post(
            '',
            [
                'middleware' => 'permission:users_create',
                'as'         => 'store',
                'uses'       => 'UsersController@store',
            ]
        );

        // Access to disable object
        Route::get(
            '{users}/disable',
            [
                'middleware' => 'permission:users_disable',
                'as'         => 'disable',
                'uses'       => 'UsersController@disable',
            ]
        );

        // Access to enable object
        Route::get(
            '{users}/enable',
            [
                'middleware' => 'permission:users_enable',
                'as'         => 'enable',
                'uses'       => 'UsersController@enable',
            ]
        );

        // Access to edit object
        Route::get(
            '{users}/edit',
            [
                'middleware' => 'permission:users_edit',
                'as'         => 'edit',
                'uses'       => 'UsersController@edit',
            ]
        );
        Route::patch(
            '{users}',
            [
                'middleware' => 'permission:users_edit',
                'as'         => 'update',
                'uses'       => 'UsersController@update',
            ]
        );
        Route::put(
            '{users}',
            [
                'middleware' => 'permission:users_edit',
                'as'         => 'update',
                'uses'       => 'UsersController@update',
            ]
        );

        // Access to delete object
        Route::delete(
            '/{users}',
            [
                'middleware' => 'permission:users_delete',
                'as'         => 'destroy',
                'uses'       => 'UsersController@destroy',
            ]
        );
    }
);
