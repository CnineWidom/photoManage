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
Route::post('/home', 'HomeController@index');
Route::post('/home/search', 'HomeController@index');
Route::get('/home/{id}', 'HomeController@index');

Route::get('uploadPicture','uploadController@index')->name('uploadPicture');
Route::post('uploadPicture/doupload','uploadController@doupload');



