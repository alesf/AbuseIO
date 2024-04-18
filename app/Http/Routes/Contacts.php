<?php

use Illuminate\Support\Facades\Route;

Route::resource('contacts', 'ContactsController');

Route::model('contacts', 'AbuseIO\Models\Contact', function () {
    throw new \Illuminate\Database\Eloquent\ModelNotFoundException();
});

Route::group(
    [
        'prefix' => 'contacts',
        'as'     => 'contacts.',
    ],
    function () {
        // Search contacts
        Route::get(
            'search/{one?}/{two?}/{three?}/{four?}/{five?}',
            [
                'middleware' => 'permission:contacts_view',
                'as'         => 'search',
                'uses'       => 'ContactsController@search',
            ]
        );

        // Access to index list
        Route::get(
            '',
            [
                'middleware' => 'permission:contacts_view',
                'as'         => 'index',
                'uses'       => 'ContactsController@index',
            ]
        );

        // Access to show object
        Route::get(
            '{contacts}',
            [
                'middleware' => 'permission:contacts_view',
                'as'         => 'show',
                'uses'       => 'ContactsController@show',
            ]
        );

        // Access to export object
        Route::get(
            'export/{format}',
            [
                'middleware' => 'permission:contacts_export',
                'as'         => 'export',
                'uses'       => 'ContactsController@export',
            ]
        );

        // Access to create object
        Route::get(
            'create',
            [
                'middleware' => 'permission:contacts_create',
                'as'         => 'create',
                'uses'       => 'ContactsController@create',
            ]
        );
        Route::post(
            '',
            [
                'middleware' => 'permission:contacts_create',
                'as'         => 'store',
                'uses'       => 'ContactsController@store',
            ]
        );

        // Access to edit object
        Route::get(
            '{contacts}/edit',
            [
                'middleware' => 'permission:contacts_edit',
                'as'         => 'edit',
                'uses'       => 'ContactsController@edit',
            ]
        );
        Route::patch(
            '{contacts}',
            [
                'middleware' => 'permission:contacts_edit',
                'as'         => 'update',
                'uses'       => 'ContactsController@update',
            ]
        );
        Route::put(
            '{contacts}',
            [
                'middleware' => 'permission:contacts_edit',
                'as'         => 'update',
                'uses'       => 'ContactsController@update',
            ]
        );

        // Access to delete object
        Route::delete(
            '{contacts}',
            [
                'middleware' => 'permission:contacts_delete',
                'as'         => 'destroy',
                'uses'       => 'ContactsController@destroy',
            ]
        );
    }
);
