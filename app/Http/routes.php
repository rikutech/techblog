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
Route::get('/', 'ArticlesController@index')->name('index');
Route::get('/create', 'ArticlesController@create')->name('create');
Route::post('/', 'ArticlesController@store')->name('store');
Route::get('/{id}/edit', 'ArticlesController@edit')->name('edit');
Route::patch('/{id}', 'ArticlesController@update')->name('update');
Route::get('/{id}', 'ArticlesController@show')->name('show');
Route::get('/users/{id}/articles', 'ArticlesController@showUsersArticle')->name('users.articles');
