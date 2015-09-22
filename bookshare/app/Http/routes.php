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
Route::get('/login', 'Front@login');
Route::get('/signup', 'Front@signup');
Route::get('profile', 'Front@profile');
// Route::get('search', 'BooksController@search');
// Route::get('share', 'BookController@share');
// Route::get('hire', 'BookController@hire');

