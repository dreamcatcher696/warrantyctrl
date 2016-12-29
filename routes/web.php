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

Route::get('/home', 'HomeController@index');
Route::get('/upload', 'PagesController@upload');
Route::get('/show', 'PagesController@show');
Route::get('/garantiebewijzen/{file}', 'PagesController@showOne');
Route::get('/update_garantie/{file}', 'pagesController@edit');
Route::get('/phpinfo', function() {
	return view('info');
});

/*Route::get('upload', function() {
  return View::make('fileupload');
});*/
Route::post('files/upload', 'FilesController@upload');
