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

Route::group(['prefix' => 'news'], function() {
	Route::get('/', 'NewsController@index');
	Route::get('/category/{slug}', 'NewsController@category');
	Route::get('/read/{id}/{slug}', 'NewsController@read');
	Route::get('/archieve/{year}/{month}', 'NewsController@archieve');
    Route::group(['prefix' => 'administrator','middleware'=>['permission']], function() {
        Route::get('/', 'Administrator\NewsController@index');
        Route::get('/view/{id}', 'Administrator\NewsController@view');
        Route::get('/status/{id}', 'Administrator\NewsController@status');
        Route::get('/create', 'Administrator\NewsController@create');
        Route::get('/edit/{id}', 'Administrator\NewsController@edit');
        Route::post('/update', 'Administrator\NewsController@update');
        Route::post('/delete', 'Administrator\NewsController@delete');
    });
});
