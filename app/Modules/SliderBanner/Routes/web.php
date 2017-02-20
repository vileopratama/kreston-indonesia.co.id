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

Route::group(['prefix' => 'slider-banner','middleware' => ['permission']], function() {
    Route::get('/', 'Administrator\SliderBannerController@index');
    Route::group(['prefix' => 'administrator'], function() {
        Route::get('/', 'Administrator\SlideBannerController@index');
        Route::get('/view/{id}', 'Administrator\SlideBannerController@view');
        Route::get('/create', 'Administrator\SlideBannerController@create');
        Route::get('/edit/{id}', 'Administrator\SlideBannerController@edit');
        Route::post('/update', 'Administrator\SlideBannerController@update');
        Route::get('/reset-password/{id}', 'Administrator\SlideBannerController@reset_password');
        Route::post('/update/password', 'Administrator\SlideBannerController@update_password');
        Route::post('/delete', 'Administrator\SlideBannerController@delete');
    });
});
