<?php
# @Date:   2019-10-29T14:03:53+00:00
# @Last modified time: 2019-11-12T19:16:46+00:00




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

Route::get('/manualcalorieadd', 'ManualcalorieController@index')->name('manualcalorieadd.index');
Route::get('/apiview', 'ApiController@index')->name('apiview.index');
Route::post('/apiview/search', 'ApiController@search')->name('apiview.search');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
