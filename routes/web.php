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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', ['uses' => 'IndexController@showIndex', 'as' => 'accueil']);

// Route::get('index', function () {
//     return view('index', 'IndexController@showIndex')->name('index');
// });
// syntaxe a revoir

// Route::get('/index', 'IndexController@showIndex')->name('index');
// route nomée

// Route::get('/index', ['uses' => 'IndexController@showIndex', 'as' => 'accueil']);
//groupe de routes 


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
