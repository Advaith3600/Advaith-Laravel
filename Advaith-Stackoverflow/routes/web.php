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

Route::get('/', ['uses' => 'PagesController@getHome', 'as' => 'home']);
Route::get('/home', 'PagesController@goHome');
// Auth -login
Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
Route::post('login', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']);
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
// Auth -register
Route::post('register', ['as' => 'register.post', 'uses' => 'Auth\RegisterController@register']);
Route::get('register', ['as' => 'register', 'uses' => 'Auth\RegisterController@showRegistrationForm']);
// Auth - password reset
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
// Question
Route::resource('/questions', 'QuestionController');
Route::get('/questions/delete/{id}', ['uses' => 'QuestionController@delete', 'as' => 'questions.delete']);
// User
Route::get('/users', ['uses' => 'UserController@index', 'as' => 'users.index']);
Route::get('/users/{id}', ['uses' => 'UserController@show', 'as' => 'users.show']);
// Tags
Route::resource('/tags', 'TagController', ['except' => 'create']);