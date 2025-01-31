<?php

use Illuminate\Support\Facades\Route;

Route::group(
    [
        'prefix'     => 'accounts',
        'as'         => 'accounts.',
        'middleware' => ['apiaccountavailable', 'apisystemaccount'],
    ],
    function () {
        // Access to index list
        Route::get(
            '',
            [
                'as'   => 'index',
                'uses' => 'AccountsController@apiIndex',
            ]
        );

        // Access to show object
        Route::get(
            '{accounts}',
            [
                'as'   => 'show',
                'uses' => 'AccountsController@apiShow',
            ]
        );

        Route::delete(
            '{accounts}',
            [
                'as'   => 'delete',
                'uses' => 'AccountsController@apiDestroy',
            ]
        );

        Route::post(
            '',
            [
                'as'   => 'store',
                'uses' => 'AccountsController@apiStore',
            ]
        );

        Route::put(
            '{accounts}',
            [
                'as'   => 'update',
                'uses' => 'AccountsController@apiUpdate',
            ]
        );
    }
);
