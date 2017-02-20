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

Route::group(['prefix' => 'popup-banner'], function() {
    Route::group(['prefix' => 'administrator','middleware' => ['permission']], function() {
        Route::get('/', 'Administrator\PopupBannerController@index');
        Route::get('/view/{id}', 'Administrator\PopupBannerController@view');
		Route::get('/status/{id}', 'Administrator\PopupBannerController@status');
        Route::get('/create', 'Administrator\PopupBannerController@create');
        Route::get('/edit/{id}', 'Administrator\PopupBannerController@edit');
        Route::post('/update', 'Administrator\PopupBannerController@update');
        Route::post('/delete', 'Administrator\PopupBannerController@delete');
    });
});
