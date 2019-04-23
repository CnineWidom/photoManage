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

Auth::routes();

Route::get('index/{id?}','HomeController@index')->name('work');
Route::post('index','HomeController@index');

Route::get('uploadPicture','uploadController@index')->name('upload');

Route::post('uploadPicture/doupload','uploadController@doupload');
Route::get('uploadPictureTip','uploadController@tipIndx')->name('tip');
Route::get('detail/{photoId?}','HomeController@showDetail')->name('detail');

Route::get('problem','HomeController@normalproblem')->name('normalproblem');
Route::get('about','HomeController@aboutUs')->name('aboutUs');
