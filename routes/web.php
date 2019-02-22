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


//测试类
Route::get('test','testController@index')->name('test');
Route::post('test','testController@index');
Route::get('kou','testController@kou')->name('kou');
Route::post('kou','testController@kou');



