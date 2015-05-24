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

Route::get('/', 'WelcomeController@index');
Route::get('sign_up', 'WelcomeController@signUp');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


Route::get("profile","ProfileController@index");
Route::get('profile/edit','ProfileController@edit');
Route::get('profile/editCV','ProfileController@editCV');
Route::get('profile/completed','ProfileController@completed');

Route::put('profile/edit/{id}','ProfileController@update');
Route::put('profile/CV','ProfileController@updateCV');
Route::put('profile/uploadProfileImage','ProfileController@uploadImage');
