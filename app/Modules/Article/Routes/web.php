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

Route::group(['prefix' => 'article'], function() {
	Route::get('/', 'ArticleController@index');
	Route::get('/category/{slug}', 'ArticleController@category');
	Route::get('/feed', 'ArticleController@feed');
	Route::get('/read/{id}/{slug}', 'ArticleController@read');
	Route::get('/archieve/{year}/{month}', 'ArticleController@archieve');
    Route::group(['prefix' => 'administrator','middleware'=>['permission']], function() {
        Route::get('/', 'Administrator\ArticleController@index');
        Route::get('/view/{id}', 'Administrator\ArticleController@view');
        Route::get('/status/{id}', 'Administrator\ArticleController@status');
        Route::get('/create', 'Administrator\ArticleController@create');
        Route::get('/edit/{id}', 'Administrator\ArticleController@edit');
        Route::post('/update', 'Administrator\ArticleController@update');
        Route::post('/delete', 'Administrator\ArticleController@delete');
    });
});
