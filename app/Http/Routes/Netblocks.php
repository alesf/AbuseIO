<?php

use Illuminate\Support\Facades\Route;

Route::resource('netblocks', 'NetblocksController');

Route::model('netblocks', 'AbuseIO\Models\Netblock', function () {
    throw new \Illuminate\Database\Eloquent\ModelNotFoundException();
});

Route::group(
    [
        'prefix' => 'netblocks',
        'as'     => 'netblocks.',
    ],
    function () {
        // Search netblock
        Route::get(
            'search/{one?}/{two?}/{three?}',
            [
                'middleware' => 'permission:netblocks_view',
                'as'         => 'search',
                'uses'       => 'NetblocksController@search',
            ]
        );

        // Access to index list
        Route::get(
            '',
            [
                'middleware' => 'permission:netblocks_view',
                'as'         => 'index',
                'uses'       => 'NetblocksController@index',
            ]
        );

        // Access to show object
        Route::get(
            '{netblocks}',
            [
                'middleware' => 'permission:netblocks_view',
                'as'         => 'show',
                'uses'       => 'NetblocksController@show',
            ]
        );

        // Access to export object
        Route::get(
            'export/{format}',
            [
                'middleware' => 'permission:netblocks_export',
                'as'         => 'export',
                'uses'       => 'NetblocksController@export',
            ]
        );

        // Access to create object
        Route::get(
            'create',
            [
                'middleware' => 'permission:netblocks_create',
                'as'         => 'create',
                'uses'       => 'NetblocksController@create',
            ]
        );
        Route::post(
            '',
            [
                'middleware' => 'permission:netblocks_create',
                'as'         => 'store',
                'uses'       => 'NetblocksController@store',
            ]
        );

        // Access to edit object
        Route::get(
            '{netblocks}/edit',
            [
                'middleware' => 'permission:netblocks_edit',
                'as'         => 'edit',
                'uses'       => 'NetblocksController@edit',
            ]
        );
        Route::patch(
            '{netblocks}',
            [
                'middleware' => 'permission:netblocks_edit',
                'as'         => 'update',
                'uses'       => 'NetblocksController@update',
            ]
        );
        Route::put(
            '{netblocks}',
            [
                'middleware' => 'permission:netblocks_edit',
                'as'         => 'update',
                'uses'       => 'NetblocksController@update',
            ]
        );

        // Access to delete object
        Route::delete(
            '/{netblocks}',
            [
                'middleware' => 'permission:netblocks_delete',
                'as'         => 'destroy',
                'uses'       => 'NetblocksController@destroy',
            ]
        );
    }
);
