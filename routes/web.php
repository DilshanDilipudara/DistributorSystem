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

Route::get('/salegraph', function () {
    return view('salegraph');
});


//month_artical_sales_graph
Route::get('/month_artical_sales_graph', 'Article_Sale_Graph@view');
Route::post('/addmonth_artical_sales_graph', 'Article_Sale_Graph@show_graph');

//Year_artical_sales_graph
Route::get('/year_artical_sale_graph', 'Article_Sale_Graph@view_year');
Route::post('/addmonth_artical_sale_graph', 'Article_Sale_Graph@show_graph_year');



//sale static
Route::get('/saleStatic', 'staticController@view');
Route::post('/showsalestatic','staticController@showSale');

Route::get('/monthlyStatic', 'staticController@viewmonth');
Route::post('/monthsale','staticController@showMonth');

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

Route::get('/supcategory','warehouseController@supcate');
 
//change Role
Route::get('/rolechange','roleChange@view');
Route::get('/deleterole/{id}','roleChange@delete');
Route::get('/activerole/{id}', 'roleChange@active');
Route::post('/updaterole','roleChange@update');

//Profile
Route::get('/profile','profile@view');
Route::post('/updateprofile','profile@update');


//Expense Type
Route::get('/ExpenseType','expenseTypeController@view');
Route::post('/addexpensetype','expenseTypeController@add');
Route::get('/deleteexpensetype/{id}','expenseTypeController@delete');
Route::get('/activeexpensetype/{id}', 'expenseTypeController@active');
Route::post('/updateexpensetype','expenseTypeController@update');


//Vechile 
Route::get('/vehicle','vehicleController@view');
Route::post('/addvehicle','vehicleController@add');
Route::get('/deletevehicle/{id}','vehicleController@delete');
Route::get('/activevehicle/{id}', 'vehicleController@active');
Route::post('/updatevehicle','vehicleController@update');

//Expense
Route::get('/Expenses','ExpensesController@view');
Route::post('/addExpenses','ExpensesController@add');
Route::post('/updateExpenses','ExpensesController@update');

//Transport Expense
Route::get('/transportExpenses','TrasportExpensesController@view');
Route::post('/addTrasportExpenses','TrasportExpensesController@add');
Route::post('/updateTrasportExpenses','TrasportExpensesController@update');


Route::get('/home', 'HomeController@index')->name('home');

// web app-7 pdf
Route::get('/sec-2/add-new-sale', 'InvoiceController@index')->name('view-new-sale');
Route::view('/sec-2/deliver-pending', 'ui-sec-2/deliver-pending')->name('view-deliver-pending');
Route::view('/sec-2/pending-order-summery', 'ui-sec-2/pending-order-summery')->name('view-pending-order-summery');
Route::get('/sec-2/review-shops', 'ShopController@getShops2Review')->name('view-review-shops');
Route::view('/sec-2/shop-profile', 'ui-sec-2/shop-profile')->name('view-shop-profile');
Route::view('/sec-2/transaction-pool', 'ui-sec-2/transaction-pool')->name('view-transaction-pool');

Route::get('/prod-cat/{prod}/articles', 'articalController@getProdArticles')->name('get-prod-art');
Route::post('/add-new-sale', 'InvoiceController@addNewSale')->name('add-new-sale');
Route::post('/shops/{shop}/review', 'ShopController@approve')->name('approve-shop');
Route::post('/shops/{shop}/submit', 'ShopController@submit')->name('submit-shop');


Route::resource('shops', 'ShopController');
