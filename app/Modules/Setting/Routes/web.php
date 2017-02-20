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

Route::group(['prefix' => 'setting','middleware' => ['permission']], function() {
    Route::group(['prefix' => 'administrator'], function() {
        Route::get('/', 'Administrator\SettingController@index');
        Route::post('/update', 'Administrator\SettingController@update');
    });
});