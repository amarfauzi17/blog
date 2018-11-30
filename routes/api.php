<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::post('login','ApiAuthenticateController@login');
Route::post('register','ApiAuthenticateController@register');

Route::group(['prefix' => 'v1','middleware'=> ['jwt.auth']],function(){
	Route::resource('posts','ApiAuthorController');
});

Route::get('v1/listuser','ApiAdminController@index')->middleware('jwt.auth');
Route::get('v1/listuser/{id}','ApiAdminController@show')->middleware('jwt.auth');
