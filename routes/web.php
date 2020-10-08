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

Auth::routes();

//metrics
Route::get('/metrics','metricController@view');
Route::post('/addmetrics','metricController@add');
Route::get('/deletemetrics/{id}','metricController@delete');
Route::get('/activemetrics/{id}', 'metricController@active');
Route::post('/updatemetrics','metricController@update');

//Artical Category
Route::get('/articalcategory', 'articalcategoryController@view');
Route::post('/addarticalcategory', 'articalcategoryController@add');
Route::get('/deletearticalcategory/{id}', 'articalcategoryController@delete');
Route::get('/activearticalcategory/{id}', 'articalcategoryController@active');
Route::post('/updatearticalcategory', 'articalcategoryController@update');


//Artical
Route::get('/artical', 'articalController@view');
Route::post('/addartical', 'articalController@add');
Route::get('/deleteartical/{id}', 'articalController@delete');
Route::get('/activeartical/{id}', 'articalController@active');
Route::post('/updateartical', 'articalController@update');

Route::get('/home', 'HomeController@index')->name('home');

// web app-7 pdf
Route::get('/sec-2/add-new-sale', 'InvoiceController@index')->name('view-new-sale');
Route::view('/sec-2/deliver-pending', 'ui-sec-2/deliver-pending')->name('view-deliver-pending');
Route::view('/sec-2/pending-order-summery', 'ui-sec-2/pending-order-summery')->name('view-pending-order-summery');
Route::view('/sec-2/review-shop', 'ui-sec-2/review-shop')->name('view-review-shop');
Route::view('/sec-2/shop-profile', 'ui-sec-2/shop-profile')->name('view-shop-profile');
Route::view('/sec-2/transaction-pool', 'ui-sec-2/transaction-pool')->name('view-transaction-pool');

Route::get('/prod-cat/{prod}/articles', 'articalController@getProdArticles')->name('get-prod-art');
Route::post('/add-new-sale', 'InvoiceController@addNewSale')->name('add-new-sale');



Route::resource('shops', 'ShopController');
