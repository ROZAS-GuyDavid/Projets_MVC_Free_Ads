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

Route::get('/', ['uses' => 'IndexController@showIndex', 'as' => 'accueil']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('user','UserController');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/user-settings', ['uses' => 'UserController@edit', 'as' => 'user.settings']);  
    Route::post('/changePassword', ['uses' => 'UserController@changePassword', 'as' => 'changePassword']);
});
