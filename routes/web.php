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
Route::post('/addmetrics','metricController@add');
Route::get('/deletemetrics/{id}','metricController@delete');
Route::get('/activemetrics/{id}', 'metricController@active');
Route::post('/updatemetrics','metricController@update');
Auth::routes();

//Artical Category
Route::get('/articalcategory', 'articalcategoryController@view');
Route::post('/addarticalcategory', 'articalcategoryController@add');
Route::get('/deletearticalcategory/{id}', 'articalcategoryController@delete');
Route::get('/activearticalcategory/{id}', 'articalcategoryController@active');
Route::post('/updatearticalcategory', 'articalcategoryController@update');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

