<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/','PagesController@home');






Route::group(['middleware' => 'web'], function () {
    Route::get('login', 'SessionController@create');
    Route::post('login','SessionController@store');
    Route::get('register', 'SessionController@register');
    Route::post('register', 'SessionController@saveUser');


    Route::group(['middleware' => ['auth']], function () {

        Route::get('logout', 'SessionController@logout');
        Route::post('logout', 'SessionController@logout');
        Route::get('/home', 'HomeController@index');

        Route::resource('flyers','FlyersController');
        Route::get('flyers/{zip}/{street}','FlyersController@show');
        Route::post('flyers/{zip}/{street}/Photos','FlyersController@addPhoto');


    });
});
