<?php

use Illuminate\Support\Facades\Route;

Route::resource('domains', 'DomainsController');
Route::model('domains', 'AbuseIO\Models\Domain', function () {
    throw new \Illuminate\Database\Eloquent\ModelNotFoundException();
});

Route::group(
    [
        'prefix' => 'domains',
        'as'     => 'domains.',
    ],
    function () {
        // Search domains
        Route::get(
            'search/{one?}/{two?}',
            [
                'middleware' => 'permission:domains_view',
                'as'         => 'search',
                'uses'       => 'DomainsController@search',
            ]
        );

        // Access to index list
        Route::get(
            '',
            [
                'middleware' => 'permission:domains_view',
                'as'         => 'index',
                'uses'       => 'DomainsController@index',
            ]
        );

        // Access to show object
        Route::get(
            '{domains}',
            [
                'middleware' => 'permission:domains_view',
                'as'         => 'show',
                'uses'       => 'DomainsController@show',
            ]
        );

        // Access to export object
        Route::get(
            'export/{format}',
            [
                'middleware' => 'permission:domains_export',
                'as'         => 'export',
                'uses'       => 'DomainsController@export',
            ]
        );

        // Access to create object
        Route::get(
            'create',
            [
                'middleware' => 'permission:domains_create',
                'as'         => 'create',
                'uses'       => 'DomainsController@create',
            ]
        );
        Route::post(
            '',
            [
                'middleware' => 'permission:domains_create',
                'as'         => 'store',
                'uses'       => 'DomainsController@store',
            ]
        );

        // Access to edit object
        Route::get(
            '{domains}/edit',
            [
                'middleware' => 'permission:domains_edit',
                'as'         => 'edit',
                'uses'       => 'DomainsController@edit',
            ]
        );
        Route::patch(
            '{domains}',
            [
                'middleware' => 'permission:domains_edit',
                'as'         => 'update',
                'uses'       => 'DomainsController@update',
            ]
        );
        Route::put(
            '{domains}',
            [
                'middleware' => 'permission:domains_edit',
                'as'         => 'update',
                'uses'       => 'DomainsController@update',
            ]
        );

        // Access to delete object
        Route::delete(
            '/{domains}',
            [
                'middleware' => 'permission:domains_delete',
                'as'         => 'destroy',
                'uses'       => 'DomainsController@destroy',
            ]
        );
    }
);
