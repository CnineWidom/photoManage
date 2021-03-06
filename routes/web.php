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

Route::post('detail/{photoId?}','HomeController@upComment');

Route::get('detail/{photoId?}','HomeController@showDetail')->name('detail');

Route::get('mine','HomeController@getMine')->name('mine');
Route::get('success',function(){
	return view('web.pic.pc.uploadPictureSuccess');
})->name('success');

//public html
Route::get('normal/{text?}',function($text){
	$resouse = 'web.pic.pc.'.$text;
    $data=[
    	'loginType' => 1
    ];
    return view($resouse,$data);
})->name('normal');
