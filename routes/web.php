<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'MainController@index');

Auth::routes();

Route::get('/files', 'FilesController@fileList')->middleware('auth')->name('filelist');
Route::get('/upload', 'FilesController@upload')->middleware('auth')->name('upload');
Route::post('/store', 'FilesController@store')->middleware('auth');
Route::get('/get/{path}/{subpath}', 'FilesController@download');
Route::get('/info/{path}/{subpath}', 'FilesController@info');

