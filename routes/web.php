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

Route::get('/', 'BlogController@all');
Route::get('/blogs', 'BlogController@all');
Route::get('/blog/{id}', 'BlogController@detail');
Route::get('/blog/update/{id}', 'BlogController@getUpdateLayout');
Route::get('/blog/', 'BlogController@getPaper');

Route::get('/author/logon/','AuthorController@logon');
Route::get('/author/','AuthorController@getUpdateLayout');