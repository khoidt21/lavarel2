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

// admin
Route::get('admin', 'AdminController@index')->name('admin.index');

// categories

Route::get('categorys', 'CategoryController@index')->name('category.index');
Route::get('categorys/create', 'CategoryController@create')->name('category.create');
Route::post('categorys/store', 'CategoryController@store')->name('category.store');
Route::get('categorys/edit/{id}', 'CategoryController@edit')->name('category.edit');
Route::get('categorys/show/{id}', 'CategoryController@show')->name('category.show');
Route::post('categorys/destroy/{id}', 'CategoryController@destroy')->name('category.destroy');
Route::post('categorys/update/{id}', 'CategoryController@update')->name('category.update');

// news

Route::get('news', 'NewsController@index')->name('new.index');
Route::get('news/create', 'NewsController@create')->name('new.create');
Route::post('news/store', 'NewsController@store')->name('new.store');
Route::get('news/edit/{id}', 'NewsController@edit')->name('new.edit');
Route::get('news/show/{id}', 'NewsController@show')->name('new.show');
Route::post('news/destroy/{id}', 'NewsController@destroy')->name('new.destroy');
Route::post('news/update/{id}', 'NewsController@update')->name('new.update');




