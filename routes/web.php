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

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::group(['prefix' => 'users', 'as' => 'user.'], function() {
   Route::post('list', 'Admin\User\UserController@list')->name('list');
   Route::get('roles', 'Admin\User\UserController@roles')->name('roles');
});
Route::resource('user', 'Admin\User\UserController');


