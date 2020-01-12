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

Route::resource('Student', 'StudentController@');
Route::get('/Student.create', 'StudentController@index')->name('Student.create');
Route::resource('Group', 'GroupController');

Route::get('/livetable/{id}', 'LiveTable@index');
Route::get('/livetable/fetch_data/{id}', 'LiveTable@fetch_data');
Route::post('/livetable/add_data', 'LiveTable@add_data')->name('livetable.add_data');
Route::post('/livetable/update_data', 'LiveTable@update_data')->name('livetable.update_data');
Route::post('/livetable/delete_data', 'LiveTable@delete_data')->name('livetable.delete_data');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
