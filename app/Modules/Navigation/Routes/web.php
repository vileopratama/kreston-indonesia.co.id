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

Route::group(['prefix' => 'navigation','middleware' => ['permission']], function() {
	Route::group(['prefix' => 'administrator'], function() {
		Route::get('/', 'Administrator\NavigationController@index');
        Route::get('/view/{id}', 'Administrator\NavigationController@view');
        Route::get('/status/{id}', 'Administrator\NavigationController@status');
        Route::get('/create', 'Administrator\NavigationController@create');
        Route::get('/edit/{id}', 'Administrator\NavigationController@edit');
        Route::post('/update', 'Administrator\NavigationController@update');
        Route::post('/delete', 'Administrator\NavigationController@delete');
	});	
});
