<?php

Route::get('/', 'ExpertController@index')->name('home');

Route::get('details', 'ExpertController@details')->name('details');

Route::get('create', 'ExpertController@create')->name('create');
Route::post('create', 'ExpertController@store')->name('store');

Route::get('edit/{id}', 'ExpertController@edit')->name('edit');
Route::post('update/{id}', 'ExpertController@update')->name('update');

Route::delete('delete/{id}', 'ExpertController@delete')->name('delete');
Route::get('RemoveDB/{id}', 'ColumnSearchingController@RemoveDB')->name('RemoveDB');

Auth::routes(['verify' => true]);
Route::get('/home', 'ExpertController@index')->name('home');

Route::get('columnSearching', 'ExpertController@columnSearching')->name('column-searching');
Route::resource('column-searching', 'ColumnSearchingController');

Route::get('mapsView', 'ExpertController@mapsView')->name('maps-View');

Auth::routes();