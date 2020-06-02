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

Route::get('/lession-4', function () {
    return view('lession-4');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user/create', 'UserController@create')->middleware('create_user');
Route::get('/user/edit', 'UserController@edit')->middleware('edit_user');
Route::get('/user/view', 'UserController@view')->middleware('view_user');
Route::get('/not_allowed', 'UserController@notAllowed');
Route::get('/show_database', 'UserController@showDatabase');
