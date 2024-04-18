<?php

use Illuminate\Support\Facades\Route;

Route::model('accounts', 'AbuseIO\Models\Account', function () {
    throw new \Illuminate\Database\Eloquent\ModelNotFoundException();
});

Route::resource('accounts', 'AccountsController');

Route::group(
    [
        'prefix' => 'accounts',
        'as'     => 'accounts.',
    ],
    function () {
        // Search contacts
        Route::get(
            'search/{one?}/{two?}/{three?}/{four?}/{five?}',
            [
                'middleware' => 'permission:accounts_view',
                'as'         => 'search',
                'uses'       => 'AccountsController@search',
            ]
        );

        // Access to index list
        Route::get(
            '',
            [
                'middleware' => 'permission:accounts_view',
                'as'         => 'index',
                'uses'       => 'AccountsController@index',
            ]
        );

        // Access to show object
        Route::get(
            '{accounts}',
            [
                'middleware' => 'permission:accounts_view',
                'as'         => 'show',
                'uses'       => 'AccountsController@show',
            ]
        );

        // Access to export object
        Route::get(
            'export/{format}',
            [
                'middleware' => 'permission:accounts_export',
                'as'         => 'export',
                'uses'       => 'AccountsController@export',
            ]
        );

        // Access to create object
        Route::get(
            'create',
            [
                'middleware' => 'permission:accounts_create',
                'as'         => 'create',
                'uses'       => 'AccountsController@create',
            ]
        );
        Route::post(
            '',
            [
                'middleware' => 'permission:accounts_create',
                'as'         => 'store',
                'uses'       => 'AccountsController@store',
            ]
        );

        // Access to disable object
        Route::get(
            '{accounts}/disable',
            [
                'middleware' => 'permission:accounts_disable',
                'as'         => 'disable',
                'uses'       => 'AccountsController@disable',
            ]
        );

        // Access to enable object
        Route::get(
            '{accounts}/enable',
            [
                'middleware' => 'permission:accounts_enable',
                'as'         => 'enable',
                'uses'       => 'AccountsController@enable',
            ]
        );

        // Access to edit object
        Route::get(
            '{accounts}/edit',
            [
                'middleware' => 'permission:accounts_edit',
                'as'         => 'edit',
                'uses'       => 'AccountsController@edit',
            ]
        );
        Route::patch(
            '{accounts}',
            [
                'middleware' => 'permission:accounts_edit',
                'as'         => '',
                'uses'       => 'AccountsController@update',
            ]
        );
        Route::put(
            '{accounts}',
            [
                'middleware' => 'permission:accounts_edit',
                'as'         => 'update',
                'uses'       => 'AccountsController@update',
            ]
        );

        // Access to delete object
        Route::delete(
            '/{accounts}',
            [
                'middleware' => 'permission:accounts_delete',
                'as'         => 'destroy',
                'uses'       => 'AccountsController@destroy',
            ]
        );
    }
);
