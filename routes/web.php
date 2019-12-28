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

Route::group(['prefix' => 'user', 'as' => 'user.'], function() {
   Route::post('list', 'Admin\User\UserController@list')->name('list');
   Route::get('roles', 'Admin\User\UserController@roles')->name('roles');
});
Route::resource('user', 'Admin\User\UserController');


Route::group(['prefix' => 'multimedia', 'as' => 'multimedia.'], function() {
    Route::post('list', 'Admin\MediaLibrary\MediaLibraryController@list')->name('list');
});
Route::resource('multimedia', 'Admin\MediaLibrary\MediaLibraryController');



Route::group(['prefix' => 'configuration'  ,'as'=>'configuration.'],  function() {
    Route::post('/data', 'Admin\Configuration\ConfigurationController@list')->name('list');
});
Route::resource('configuration','Admin\Configuration\ConfigurationController');
