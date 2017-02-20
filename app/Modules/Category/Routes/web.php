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

Route::group(['prefix' => 'category'], function() {
	Route::group(['prefix' => 'administrator'], function() {
        Route::get('/index', 'Administrator\CategoryController@index');
        Route::get('/view/{id}', 'Administrator\CategoryController@view');
		Route::get('/status/{id}', 'Administrator\CategoryController@status');
        Route::get('/create', 'Administrator\CategoryController@create');
        Route::get('/edit/{id}', 'Administrator\CategoryController@edit');
        Route::post('/update', 'Administrator\CategoryController@update');
        Route::post('/delete', 'Administrator\CategoryController@delete');
    });
});
