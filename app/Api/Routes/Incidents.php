<?php

use Illuminate\Support\Facades\Route;

Route::group(
    [
        'prefix'     => 'incidents',
        'as'         => 'incidents.',
        'middleware' => ['apiaccountavailable', 'apisystemaccount'],
    ],
    function () {
        Route::post(
            '',
            [
                'as'   => 'store',
                'uses' => 'IncidentsController@apiStore',
            ]
        );
    }
);
