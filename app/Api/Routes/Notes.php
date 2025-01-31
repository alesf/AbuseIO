<?php

use Illuminate\Support\Facades\Route;

Route::group(
    [
        'prefix'     => 'notes',
        'as'         => 'notes',
        'middleware' => ['apiaccountavailable', 'apisystemaccount'],
    ],
    function () {
        // Access to index list
        Route::get(
            '',
            [
                'as'   => 'index',
                'uses' => 'NotesController@apiIndex',
            ]
        );

        // Access to show object
        Route::get(
            '{notes}',
            [
                'as'   => 'show',
                'uses' => 'NotesController@apiShow',
            ]
        );
        //
        //        Route::delete(
        //            '{notes}',
        //            [
        //                'as'   => 'delete',
        //                'uses' => 'NotesController@apiDestroy',
        //            ]
        //        );
        //
        Route::post(
            '',
            [
                'as'   => 'store',
                'uses' => 'NotesController@apiStore',
            ]
        );
        //
        //        Route::put(
        //            '{notes}',
        //            [
        //                'as'   => 'update',
        //                'uses' => 'NotesController@apiUpdate',
        //            ]
        //        );
    }
);
