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

Route::get('/', 'appController@welcome')->name('welcome');

Route::get('home', 'appController@home')->name('home');

Route::get('about', 'appController@aboutUs')->name('about');

Route::get('contact', 'appController@contact')->name('contact');

Route::post('add', 'appController@addUser')->name('add');

Route::any('delete/{user_id?}', 'appController@deleteUser')->name('delete');

Route::any('edit/{userId?}', 'appController@editUser')->name('editUser');

Route::post('editUserAction', 'appController@editUserAction')->name('editUserAction');
