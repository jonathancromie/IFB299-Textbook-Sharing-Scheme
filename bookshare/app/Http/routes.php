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


/* Re-route these when changing to BookController */
Route::get('/index', 'Front@index');
Route::get('/share', 'Front@share');
Route::get('/borrow', 'Front@borrow');
Route::get('/search', 'Front@search');
Route::get('/results', 'Front@results');
Route::resource('books', 'BookController');
Route::get('/profile', 'Front@profile');
Route::get('/help', 'Front@help');
Route::get('/faq', 'Front@faq');
Route::get('terms', 'Front@terms');

// Authentication routes...
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', 'Auth\AuthController@postRegister');