<?php

use Illuminate\Support\Facades\Route;

Route::group(
    [
        'prefix'     => 'users',
        'as'         => 'users.',
        'middleware' => ['apiaccountavailable', 'apisystemaccount'],
    ],
    function () {
        // Access to index list
        Route::get(
            '',
            [
                'as'   => 'index',
                'uses' => 'UsersController@apiIndex',
            ]
        );

        // Access to show object
        Route::get(
            '{users}',
            [
                'as'   => 'show',
                'uses' => 'UsersController@apiShow',
            ]
        );
    }
);
