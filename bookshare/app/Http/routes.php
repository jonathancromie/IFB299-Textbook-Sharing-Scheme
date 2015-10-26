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

Route::get('/', 'Front@index');
Route::get('/index', 'Front@index');
Route::get('/share', 'Front@share');
Route::get('/borrow', 'Front@borrow');
Route::get('/search', 'Front@search');
Route::get('/results', 'Front@results');
Route::resource('books', 'BookController');
Route::get('/about', 'Front@about');
Route::get('/help', 'Front@help');
Route::get('/faq', 'Front@faq');
Route::get('/terms', 'Front@terms');

// Authentication routes...
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');

// Social login
Route::get('login/facebook', 'Auth\AuthController@redirectToProvider');
Route::get('/login/facebook/callback', 'Auth\AuthController@handleProviderCallback');

// Route::get('/login/{provider?}',[
//     'uses' => 'Auth\AuthController@getSocialAuth',
//     'as'   => 'auth.getSocialAuth'
// ]);

// Route::get('/login/callback/{provider?}',[
//     'uses' => 'Auth\AuthController@getSocialAuthCallback',
//     'as'   => 'auth.getSocialAuthCallback'
// ]);

// Registration routes...
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', 'Auth\AuthController@postRegister');

// User routes
Route::get('profile', 'UserController@showProfile');

Route::get('borrow/{id}', 'ContractController@insertBorrower');
// Route::get('borrow/{id}', function($id) {
// 	return View::make('borrow')->with('id', $id);
// });
Route::get('book/books', 'BookController@show');
// Route::get('books/{id}', function($id) {
// 	return View::make('books')->with('id', $id);
// });