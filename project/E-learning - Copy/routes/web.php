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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route for category
Route::post('/categorySave', 'CategoryController@store')->name('category.save');

//Route getCategoryList //  Step: 6
Route::get('/CategoryList', 'CategoryController@index')->name('category.index');

//Route getCategoryEdit
Route::get('/categoryById/{id}', 'CategoryController@edit')->name('category.edit');

//Route categoryUpdate
Route::post('/categoryUpdate/{id}', 'CategoryController@update')->name('category.update');


//Route categoryUpdate
Route::get('/categoryDelete/{id}', 'CategoryController@destroy')->name('category.delete');




