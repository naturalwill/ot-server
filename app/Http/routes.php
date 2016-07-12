<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    	//return  str_random(60);
    return view('welcome');
});

//Route::auth();

//Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'api/v1'], function () {
	Route::post('login', 'Auth\AuthController@apilogin');
	Route::post('register', 'Auth\AuthController@apiregister');
	Route::group(['middleware' => 'authapi.deny'], function () {
		Route::get('t', function () {
			//return  str_random(60);
			return oapi_response('welcome');
		});
		
	});
	Route::group(['middleware' => 'authapi.info'], function () {
		Route::get('te', function () {
			//return  str_random(60);
			return oapi_response('welcome');
		});
		
	});
	
});
