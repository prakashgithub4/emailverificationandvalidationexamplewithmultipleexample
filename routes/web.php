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

Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/store', 'HomeController@store')->name('store');
Route::get('/multipledelete/{id?}', 'HomeController@multipledelete');
Route::get('/multile/form',function(){
  return view('multiple');
});
Route::get('addmore/{id?}','MultipleformData@index');