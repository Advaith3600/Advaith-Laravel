<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'auth'], function () {

	// Home Page
	Route::get('/home', 'HomeController@index');
	Route::get('/home/options', 'HomeController@option');
	// Auth - logout
	Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
	Route::get('login', 'PagesController@authlogin');
	Route::post('/home/post/{user_id}', ['uses' => 'PostController@store', 'as' => 'posts.store']);

});


Route::group(['middleware' => 'guest'], function () {

	Route::get('/', 'PagesController@index');
	// Auth - login
	Route::post('login', ['as' => 'login', 'uses' => 'Auth\LoginController@login']);
	Route::get('login', 'PagesController@guestlogin');
	// Auth - register
	Route::post('register', ['as' => 'register', 'uses' => 'Auth\RegisterController@register']);
	// Auth - password reset
	Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
	Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
	Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
	Route::post('password/reset', 'Auth\ResetPasswordController@reset');

});