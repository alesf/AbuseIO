<?php

use Illuminate\Support\Facades\Route;

Route::group(
    [
        'prefix'     => 'gdpr',
        'as'         => 'gdpr.',
        'middleware' => ['apiaccountavailable', 'apisystemaccount'],
    ],
    function () {
        Route::get(
            'anonymize/{email}',
            [
                'as'   => 'anonymize',
                'uses' => 'GdprController@apiAnonymize',
            ]
        );
    }
);
