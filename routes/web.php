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

//metrics
Route::get('/metrics','metricController@view');
Route::post('/add','metricController@add');
Route::get('/delete/{id}','metricController@delete');
Route::post('/update','metricController@update');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
