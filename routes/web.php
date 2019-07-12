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
Route::group(['middleware' => ['web']], function () {
    Route::get('/', 'BlogController@all');
    Route::get('/blogs', 'BlogController@all')->name('blog-index');
    Route::get('/blog/{id}', 'BlogController@detail')->name('blog-detail');
    Route::get('/blog/update/{id}', 'BlogController@getUpdateLayout')->name('blog-update')->middleware('auth');
    Route::get('/blog', 'BlogController@getPaper')->name('page')->middleware('auth');
    Route::put('/blog/', 'BlogController@insert')->name('blog-insert');
    Route::post('/blog/', 'BlogController@update')->name('blog-update-ajax');
    Route::delete('/blog/', 'BlogController@delete');

    Route::get('/author/logon/','AuthorController@logon')->name('logon');
    Route::get('/author/login/','AuthorController@logon')->name('login');
    Route::get('/author/','AuthorController@getUpdateLayout')->middleware('auth');
    Route::patch('/author/','AuthorController@updateDetail');
    Route::post('/author/','AuthorController@login');
    Route::put('/author/','AuthorController@insert');
    Route::get('/author/logout/','AuthorController@logout');
});
