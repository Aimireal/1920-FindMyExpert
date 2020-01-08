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

Route::get('/', 'ExpertController@index')->name('home');

Route::get('details', 'ExpertController@details')->name('details');

Route::get('create', 'ExpertController@create')->name('create');
Route::post('create', 'ExpertController@store')->name('store');

Route::get('edit/{id}', 'ExpertController@edit')->name('edit');
Route::post('update/{id}', 'ExpertController@update')->name('update');

Route::delete('delete/{id}', 'ExpertController@delete')->name('delete');

Route::get('view', 'ExpertController@view')->name('view');

Auth::routes(['verify' => true]);
Route::get('/home', 'ExpertController@index')->name('home');

Route::resource('column-searching', 'ColumnSearchingController');
