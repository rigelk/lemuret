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

$router->pattern('id', '[0-9]+');
$router->pattern('name', '[A-Za-z]+');

Route::get('/', 'WelcomeController@index');
Route::get('home', 'HomeController@index');
Route::get('/messages', 'MessagesController@showMessages');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(['permissions' => ['view.search']], function(){
    Route::get('/search', 'SearchController@index');
    Route::get('/search/query', 'SearchController@query');
    Route::get('/map', 'SearchController@map');
    
    Route::group(['except' => ['self']], function(){
	Route::get('/profile/{id}', 'ProfileController@showProfile');
    });
});
