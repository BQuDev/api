<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/



Route::get('api/v1/logout', function() {
    Auth::logout();
});



Route::group(array('prefix' => 'api/v1', 'before' => 'auth.basic'), function()
{
    Route::get('/', 'UsersController@index');
    Route::resource('categories', 'CategoriesController');
    Route::resource('sub-categories', 'SubCategoriesController');
    Route::resource('events', 'EventsController');
    Route::resource('users', 'UsersController');
});

