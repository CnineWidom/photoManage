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
Route::get('/loginpc', 'UserloginController@login')->name('loginpc');
Route::post('/login1', 'UserloginController@dologin');

Route::get('/register', 'UserloginController@register')->name('pc.doregister');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
