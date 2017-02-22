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
	Route::get( 'log', [ 'as' => 'log.index', 'uses' => 'BodyLogRecordController@index' ] );
	Route::get( 'log/create', [ 'as' => 'log.create', 'uses' => 'BodyLogRecordController@create' ] );
	Route::get( 'log/{id?}', [ 'as' => 'log.show', 'uses' => 'BodyLogRecordController@show' ] );
	Route::put( 'log/{id?}', [ 'as' => 'log.update', 'uses' => 'BodyLogRecordController@update' ] );
	Route::post( 'log', [ 'as' => 'log.store', 'uses' => 'BodyLogRecordController@store' ] );

	Route::get('progress', [ 'as' => 'progress', 'uses' => 'BodyProgressController@show' ] );


	Route::group(['as' => 'exercise::'], function() {
		// Exercise Logs
		Route::get( 'exercise', [ 'as' => 'index', 'uses' => 'ExerciseController@index' ] );
		Route::get( 'exercise/create', [ 'as' => 'create', 'uses' => 'ExerciseController@create' ] );
		Route::get( 'exercise/{id?}', [ 'as' => 'show', 'uses' => 'ExerciseController@show' ] );
		Route::put( 'exercise/{id?}', [ 'as' => 'update', 'uses' => 'ExerciseController@update' ] );
		Route::post( 'exercise', [ 'as' => 'store', 'uses' => 'BodyLogRecordController@store' ] );

	});

	Route::get('/', 'HomeController@index');
	Route::get('/home', 'HomeController@index');
});

Auth::routes();

