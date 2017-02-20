<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your module. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['prefix' => 'publication'], function() {
    Route::group(['prefix' => 'administrator','middleware' => ['permission']], function() {
        Route::get('/', 'Administrator\PublicationController@index');
        Route::get('/view/{id}', 'Administrator\PublicationController@view');
		Route::get('/status/{id}', 'Administrator\PublicationController@status');
        Route::get('/create', 'Administrator\PublicationController@create');
        Route::get('/edit/{id}', 'Administrator\PublicationController@edit');
        Route::post('/update', 'Administrator\PublicationController@update');
        Route::post('/delete', 'Administrator\PublicationController@delete');
    });
});
