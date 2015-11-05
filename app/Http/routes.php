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

#region PUBLIC ROUTES
Route::get('/', 'PhotosController@index');

Route::get('/periods', 'PeriodsController@index');
Route::get('/periods/active', 'PeriodsController@active');
Route::get('/periods/future', 'PeriodsController@future');

// Authentication routes
Route::get('/login', 'Auth\AuthController@getLogin');
Route::post('/login', 'Auth\AuthController@postLogin');
Route::get('/logout', 'Auth\AuthController@getLogout');


// Registration routes
Route::get('/register', 'Auth\AuthController@getRegister');
Route::post('/register', 'Auth\AuthController@postRegister');
#endregion


#region AUTHORIZED ROUTES
Route::group(['middleware' => 'auth'], function()
{
    Route::get('/users', 'UsersController@index');
    Route::post('/users/delete','UsersController@destroy');
    Route::post('/votes', 'PhotosController@postVote');
    Route::post('/create', ['as' => 'upload_photo', 'uses' => 'PhotosController@postPhoto']);
    Route::get('/profile', 'ProfileController@index');
});
