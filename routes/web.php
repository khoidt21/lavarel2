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

Route::get('categorys/index', 'CategoryController@index')->name('category.index');
Route::get('categorys/create', 'CategoryController@create')->name('category.create');
Route::post('categorys/store', 'CategoryController@store')->name('category.store');
Route::post('categorys/edit', 'CategoryController@edit')->name('category.edit');
Route::get('categorys/show/{id}', 'CategoryController@show')->name('category.show');
Route::post('categorys/destroy', 'CategoryController@destroy')->name('category.destroy');
