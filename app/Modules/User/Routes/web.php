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

Route::group(['prefix' => 'user','middleware' => ['permission']], function() {
    Route::get('/', 'Administrator\AuthController@index');
    Route::group(['prefix' => 'administrator'], function() {
        Route::get('/', 'Administrator\UserController@index');
		Route::get('/view/{id}', 'Administrator\UserController@view');
		Route::get('/create', 'Administrator\UserController@create');
		Route::get('/edit/{id}', 'Administrator\UserController@edit');
		Route::post('/update', 'Administrator\UserController@update');
		Route::get('/reset-password/{id}', 'Administrator\UserController@reset_password');
		Route::post('/update/password', 'Administrator\UserController@update_password');
        Route::post('/delete', 'Administrator\UserController@delete');
    });
});
