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


//suppler
Route::get('/suppler','supplerController@view');
Route::post('/addsuppler','supplerController@add');
Route::get('/deletesuppler/{id}','supplerController@delete');
Route::get('/activesuppler/{id}', 'supplerController@active');
Route::post('/updatesuppler','supplerController@update');


//warehouse
Route::get('/warehouse','warehouseController@view');
Route::post('/addwarehouse','warehouseController@add');
Route::get('/deletewarehouse/{id}','warehouseController@delete');
Route::get('/activewarehouse/{id}', 'warehouseController@active');
Route::post('/updatewarehouse','warehouseController@update');

//change Role
Route::get('/rolechange','roleChange@view');
Route::get('/deleterole/{id}','roleChange@delete');
Route::get('/activerole/{id}', 'roleChange@active');
Route::post('/updaterole','roleChange@update');

//Profile
Route::get('/profile','profile@view');
Route::post('/updateprofile','profile@update');

Route::get('/home', 'HomeController@index')->name('home');

// web app-7 pdf
Route::get('/sec-2/add-new-sale', 'InvoiceController@index')->name('view-new-sale');
Route::view('/sec-2/deliver-pending', 'ui-sec-2/deliver-pending')->name('view-deliver-pending');
Route::view('/sec-2/pending-order-summery', 'ui-sec-2/pending-order-summery')->name('view-pending-order-summery');
Route::get('/sec-2/review-shops', 'ShopController@getReviewShops')->name('view-review-shops');
Route::view('/sec-2/shop-profile', 'ui-sec-2/shop-profile')->name('view-shop-profile');
Route::view('/sec-2/transaction-pool', 'ui-sec-2/transaction-pool')->name('view-transaction-pool');

Route::get('/prod-cat/{prod}/articles', 'articalController@getProdArticles')->name('get-prod-art');
Route::post('/add-new-sale', 'InvoiceController@addNewSale')->name('add-new-sale');

Route::post('/approve-shop', 'ShopController@approveShop')->name('approve-shop');



Route::resource('shops', 'ShopController');
