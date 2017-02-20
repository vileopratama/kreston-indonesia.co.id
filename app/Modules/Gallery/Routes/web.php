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

Route::group(['prefix' => 'gallery'], function() {
	Route::get('/collection', 'GalleryController@index');
	Route::get('/event/{id}/{slug}', 'GalleryController@event');
    Route::group(['prefix' => 'administrator','middleware' => ['permission']], function() {
        Route::get('/', 'Administrator\GalleryController@index');
        Route::get('/view/{id}', 'Administrator\GalleryController@view');
        Route::get('/status/{id}', 'Administrator\GalleryController@status');
        Route::get('/create', 'Administrator\GalleryController@create');
        Route::get('/edit/{id}', 'Administrator\GalleryController@edit');
        Route::post('/update', 'Administrator\GalleryController@update');
        Route::get('/upload/{id}', 'Administrator\GalleryController@upload');
        Route::get('/server-images','Administrator\GalleryController@server_images');
        Route::post('/upload/post', 'Administrator\GalleryController@do_upload');
        Route::post('/upload/delete', 'Administrator\GalleryController@do_upload_delete');
        Route::post('/delete', 'Administrator\GalleryController@delete');
    });
});
