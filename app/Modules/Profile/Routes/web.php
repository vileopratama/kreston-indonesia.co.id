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

Route::group(['prefix' => 'profile','middleware' => ['permission']], function() {
    Route::get('/', ['uses' => 'ProfileController@index']);
	Route::get('/change-password', ['uses' => 'ProfileController@password']);
	Route::post('/do-update/profile', ['uses' => 'ProfileController@do_update_profile']);
	Route::post('/do-update/password', ['uses' => 'ProfileController@do_update_password']);
});
