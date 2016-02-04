<?php

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::resource('locales', 'LocalesController');

    Route::get('translates', ['as' => 'translates.index', 'uses' => 'TranslatesController@index']);
    Route::get('translates/{id}', ['as' => 'translates.edit', 'uses' => 'TranslatesController@edit']);
    Route::post('translates/{id}', ['as' => 'translates.store', 'uses' => 'TranslatesController@store']);
});

Route::group(['middleware' => 'api', 'prefix' => 'api', 'namespace' => 'Api'], function () {
    Route::resource('locales', 'LocalesController', ['only' => ['index']]);

    Route::get('translate', 'TranslateController@index');
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();
});
