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

Route::get('/', 'PagesController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/panel', 'UserPanelController@index');

Route::resource('/kost', 'KostController');

Route::resource('/fasilitas', 'FasilitasController');

// Admin
Route::get('/admin', 'AdminController@index');
Route::get('/admin/{user}/editUser', 'AdminController@editUser');
Route::put('/admin/{user}', 'AdminController@updateRole')->name('admin.updateRole');
Route::post('/admin/{user}', 'AdminController@updateUser')->name('updateUser');
Route::delete('/admin/{user}', 'AdminController@deleteUser')->name('admin.deleteUser');
Route::get('/admin/create/fasilitas', 'AdminController@createFasilitas')->name('create.fasilitas');
Route::post('/admin/store/fasilitas', 'AdminController@storeFasilitas')->name('fasilitasStore');
Route::delete('/admin/{fasilitas}/fasilitas', 'AdminController@deleteFasilitas')->name('delete.fasilitas');
