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

Route::group(['prefix' => 'advertising'], function() {
    Route::group(['prefix' => 'administrator','middleware' => ['permission']], function() {
        Route::get('/', 'Administrator\AdvertisingController@index');
        Route::get('/view/{id}', 'Administrator\AdvertisingController@view');
		Route::get('/status/{id}', 'Administrator\AdvertisingController@status');
        Route::get('/create', 'Administrator\AdvertisingController@create');
        Route::get('/edit/{id}', 'Administrator\AdvertisingController@edit');
        Route::post('/update', 'Administrator\AdvertisingController@update');
        Route::post('/delete', 'Administrator\AdvertisingController@delete');
    });
});
