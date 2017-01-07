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

Route::get('/', 'PagesController@index' );

Auth::routes();

Route::get('/home', 'PagesController@redirectFromLogin')->middleware("auth");
Route::get('/upload', 'PagesController@upload')->middleware("auth");
Route::get('/show', 'PagesController@show')->middleware("auth");
Route::get('/garantiebewijzen/{file}', 'PagesController@showOne')->middleware("auth");
Route::get('/update_garantie/{file}', 'PagesController@checkwijzigordelete')->middleware("auth");
Route::patch('garantiebewijzen/{file}', 'FilesController@update');
Route::get('/phpinfo', function() {
	return view('info');
});

/*Route::get('upload', function() {
  return View::make('fileupload');
});*/
Route::post('files/upload', 'FilesController@upload')->middleware("auth");
