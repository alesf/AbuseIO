<?php

use Illuminate\Support\Facades\Route;

Route::resource('notes', 'NotesController');

Route::model('notes', 'AbuseIO\Models\Note', function () {
    throw new \Illuminate\Database\Eloquent\ModelNotFoundException();
});

Route::group(
    [
        'prefix' => 'notes',
        'as'     => 'notes.',
    ],
    function () {
        // Access to index list
        Route::get(
            '',
            [
                'middleware' => 'permission:notes_view',
                'as'         => 'index',
                'uses'       => 'NotesController@index',
            ]
        );

        // Access to show object
        Route::get(
            '{notes}',
            [
                'middleware' => 'permission:notes_view',
                'as'         => 'show',
                'uses'       => 'NotesController@show',
            ]
        );

        // Access to create object
        Route::get(
            'create',
            [
                'middleware' => 'permission:notes_create',
                'as'         => 'create',
                'uses'       => 'NotesController@create',
            ]
        );
        Route::post(
            '',
            [
                'middleware' => ['permission:notes_create', 'appendnotesubmitter'],
                'as'         => 'store',
                'uses'       => 'NotesController@store',
            ]
        );

        // Access to edit object
        Route::get(
            '{notes}/edit',
            [
                'middleware' => 'permission:notes_edit',
                'as'         => 'edit',
                'uses'       => 'NotesController@edit',
            ]
        );
        Route::patch(
            '{notes}',
            [
                'middleware' => ['permission:notes_edit', 'appendnotesubmitter'],
                'as'         => 'update',
                'uses'       => 'NotesController@update',
            ]
        );
        Route::put(
            '{notes}',
            [
                'middleware' => ['permission:notes_edit', 'appendnotesubmitter'],
                'as'         => 'update',
                'uses'       => 'NotesController@update',
            ]
        );

        // Access to delete object
        Route::delete(
            '/{notes}',
            [
                'middleware' => 'permission:notes_delete',
                'as'         => 'destroy',
                'uses'       => 'NotesController@destroy',
            ]
        );
    }
);
