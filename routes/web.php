<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Route::group(['as' => 'authenticated::', 'middleware' => 'auth'], function() {
	// Body Logs
	Route::get( 'log', [ 'as' => 'log.create', 'uses' => 'BodyLogRecordController@create' ] );
	Route::get( 'log/{id?}', [ 'as' => 'log.show', 'uses' => 'BodyLogRecordController@show' ] );
	Route::put( 'log/{id?}', [ 'as' => 'log.update', 'uses' => 'BodyLogRecordController@update' ] );
	Route::post( 'log', [ 'as' => 'log.store', 'uses' => 'BodyLogRecordController@store' ] );

	Route::get('progress', [ 'as' => 'progress', 'uses' => 'BodyProgressController@show' ] );
});

Auth::routes();

Route::get('/', 'HomeController@index');
