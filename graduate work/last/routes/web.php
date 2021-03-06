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

// faq + ask
Route::get('/', 'HomeController@index');
Route::get('ask', 'HomeController@ask')->name('questionAsk');
Route::post('ask', 'HomeController@store')->name('questionStore');

//auth
//Auth::routes();
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

//admin
Route::get('/admin', 'HomeController@indexAdmin')->name('home.index');
Route::get('/admin/home', 'HomeController@indexAdmin')->name('home.index');
Route::resource('/admin/admins', 'AdminsController');
Route::resource('/admin/questions', 'QuestionsController');
Route::get('admin/questions/index/{status}', 'QuestionsController@indexStatus')->name('questions.index.status');
Route::get('admin/questions/{question}/answer', 'QuestionsController@answer')->name('questions.answer');
Route::put('admin/questions/{question}/answer/update', 'QuestionsController@updateAnswer')->name('answer.update');
Route::put('admin/questions/{question}/status', 'QuestionsController@changeStatus')->name('status.change');
Route::put('admin/questions/{question}/answer/display', 'QuestionsController@display')->name('answer.display');
Route::resource('/admin/topics', 'TopicsController');
Route::resource('/admin/words', 'WordsController');
Route::get('admin/blocked', 'QuestionsController@indexBlocked')->name('blocked.index');