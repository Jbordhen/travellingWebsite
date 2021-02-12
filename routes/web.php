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
    return view('welcome');
});
Route::get('/home', 'Controller@home');

Route::get('/tours', 'Controller@tours');

Route::get('/places', 'Controller@places');

Route::get('/about', 'Controller@about');

Route::delete('/delete', 'TravelController@destroy');

Route::post('/create', 'TravelController@create');

Route::get('/edit', 'TravelController@update');

Route::get('/comment', 'TravelController@comment');

Route::get('/search', 'TravelController@search');

Route::get('/tourSearch', 'TravelController@tour');

Route::get('/tourCreate', 'TravelController@createTour');

Route::post('/login','AuthenticationController@login');

Route::post('/signup','AuthenticationController@signup');

Route::get('/logout','AuthenticationController@logout');
