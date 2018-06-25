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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('users/destroy/{id}', 'UserController@destroy')->name('users.destroy');
Route::get('roles/destroy/{id}', 'RolesController@destroy')->name('roles.destroy');
Route::get('movies/destroy/{id}', 'MoviesController@destroy')->name('movies.destroy');

Route::resource('users', 'UserController');
Route::resource('movies', 'MoviesController');
Route::resource('roles', 'RolesController');
Route::resource('reviews', 'ReviewsController');
