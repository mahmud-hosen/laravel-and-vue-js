<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//............................ Category Route ........................

//Route for category
Route::post('/categoryStore', 'CategoryController@store')->name('category.store');

//Route getCategoryList //  Step: 6
//Route::get('/CategoryList', 'CategoryController@index')->name('category.index');

//Route getCategoryEdit
//Route::get('/categoryById/{id}', 'CategoryController@edit')->name('category.edit');

//Route categoryUpdate
//Route::post('/categoryUpdate/{id}', 'CategoryController@update')->name('category.update');

//Route categoryUpdate
//Route::get('/categoryDelete/{id}', 'CategoryController@destroy')->name('category.delete');
