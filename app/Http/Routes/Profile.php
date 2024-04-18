<?php

use Illuminate\Support\Facades\Route;

Route::resource('profile', 'ProfileController');

Route::group(
    [
        'prefix' => 'profile',
        'as'     => 'profile.',
    ],
    function () {
        // Access to index list
        Route::get(
            '',
            [
                'middleware' => 'permission:profile_manage',
                'as'         => 'index',
                'uses'       => 'ProfileController@edit',
            ]
        );

        // Access to edit object
        Route::patch(
            '{profile}',
            [
                'middleware' => 'permission:profile_manage',
                'as'         => 'update',
                'uses'       => 'ProfileController@update',
            ]
        );
        Route::put(
            '{profile}',
            [
                'middleware' => 'permission:profile_manage',
                'as'         => 'update',
                'uses'       => 'ProfileController@update',
            ]
        );
    }
);
