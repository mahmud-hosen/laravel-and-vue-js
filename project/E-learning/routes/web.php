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
Route::post('/categorySave', 'CategoryController@store')->name('category.store');

//Route getCategoryList //  Step: 6
Route::get('/CategoryList', 'CategoryController@index')->name('category.index');

//Route getCategoryEdit
Route::get('/categoryById/{id}', 'CategoryController@edit')->name('category.edit');

//Route categoryUpdate
Route::post('/categoryUpdate/{id}', 'CategoryController@update')->name('category.update');

//Route categoryUpdate
Route::get('/categoryDelete/{id}', 'CategoryController@destroy')->name('category.delete');

//-------------------------------    Sub Category Route-------------------------------
Route::post('/subCategorySave', 'SubCategoryController@store')->name('subCategory.store');
Route::get('/subCategoryList', 'SubCategoryController@index')->name('subCategory.index');
Route::get('/subCategoryById/{id}', 'SubCategoryController@edit')->name('subCategory.edit');
Route::post('/subCategoryUpdate/{id}', 'SubCategoryController@update')->name('subCategory.update');
Route::get('/subCategoryDelete/{id}', 'SubCategoryController@destroy')->name('subCategory.delete');







