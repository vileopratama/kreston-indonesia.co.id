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

Route::group(['prefix' => 'home-banner'], function() {
    Route::group(['prefix' => 'administrator','middleware' => ['permission']], function() {
        Route::get('/', 'Administrator\HomeBannerController@index');
        Route::get('/view/{id}', 'Administrator\HomeBannerController@view');
		Route::get('/status/{id}', 'Administrator\HomeBannerController@status');
        Route::get('/create', 'Administrator\HomeBannerController@create');
        Route::get('/edit/{id}', 'Administrator\HomeBannerController@edit');
        Route::post('/update', 'Administrator\HomeBannerController@update');
        Route::post('/delete', 'Administrator\HomeBannerController@delete');
    });
});
