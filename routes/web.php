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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('admin/routes', 'HomeController@admin')->middleware('admin');
Route::get('author/routes', 'HomeController@author')->middleware('author');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/listuser', 'listUserController@index')->name('listuser.index');
Route::delete('/listuser/{id}', 'listUserController@destroy')->name('listuser.destroy');
Route::put('/listuser/{id}', 'listUserController@update')->name('listuser.update');

Route::resource('posts','PostController');
Route::resource('category','CategoryController');
Route::resource('tags','TagController');

Route::post('comment/create/{post}','CommentController@buatkomentar')->name('buatkomentar.store');
Route::post('search','SearchController@search')->name('search');