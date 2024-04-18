<?php

use Illuminate\Support\Facades\Route;

Route::resource('gdpr', 'GdprController');

Route::group(
    [
        'prefix' => 'gdpr',
        'as'     => 'gdpr.',
    ],
    function () {
        // Access to edit object
        Route::post(
            '{contacts}',
            [
                'middleware' => 'permission:contacts_edit',
                'as'         => 'anonymize',
                'uses'       => 'GdprController@anonymize',
            ]
        );
    }
);
