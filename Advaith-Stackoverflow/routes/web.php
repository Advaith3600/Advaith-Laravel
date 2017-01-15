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
// Profile
Route::get('/profile', ['uses' => 'PagesController@profile', 'as' => 'profile.index'])->middleware('auth');
Route::get('/profile/edit', ['uses' => 'PagesController@profileEdit', 'as' => 'profile.edit'])->middleware('auth');
Route::put('/profile/edit/image/{id}', ['uses' => 'PagesController@profileEditImg', 'as' => 'profile.image'])->middleware('auth');
Route::put('/profile/edit/details/{id}', ['uses' => 'PagesController@profileEditDetails', 'as' => 'profile.details'])->middleware('auth');
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
Route::get('/questions/{id}/{slug}', ['uses' => 'QuestionController@slug', 'as' => 'questions.slug']);
// User
Route::get('/users', ['uses' => 'UserController@index', 'as' => 'users.index']);
Route::get('/users/{id}', ['uses' => 'UserController@show', 'as' => 'users.show']);
// Tags
Route::resource('/tags', 'TagController', ['except' => 'create']);
// Answers
Route::post('answer/{question_id}', ['uses' => 'AnswerController@store', 'as' => 'answers.store'])->middleware('auth');
Route::get('answer/{id}/edit', ['uses' => 'AnswerController@edit', 'as' => 'answers.edit'])->middleware('auth');
Route::put('answer/{id}/edit', ['uses' => 'AnswerController@update', 'as' => 'answers.update'])->middleware('auth');
Route::get('answer/delete/{id}', ['uses' => 'AnswerController@delete', 'as' => 'answers.delete'])->middleware('auth');
Route::delete('answer/delete/{id}', ['uses' => 'AnswerController@destroy', 'as' => 'answers.destroy'])->middleware('auth');
// Votes
Route::post('qvote', 'voteController@qvote')->middleware('auth');
Route::post('avote', 'voteController@avote')->middleware('auth');
