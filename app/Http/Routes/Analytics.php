<?php

use Illuminate\Support\Facades\Route;

Route::group(
    [
        'prefix' => 'analytics',
        'as'     => 'analytics.',
    ],
    function () {
        // Access to index list
        Route::get(
            '',
            [
                'middleware' => 'permission:analytics_view',
                'as'         => 'view',
                'uses'       => 'AnalyticsController@index',
            ]
        );
        Route::get(
            'graph',
            [
                'middleware' => 'permission:analytics_view',
                'as'         => 'view',
                'uses'       => 'AnalyticsController@show',
            ]
        );
    }
);
