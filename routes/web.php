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

Auth::routes();

//Route::get('/', 'HomeController@home');
//Route::get('/en', 'HomeController@enghome');
//
//Route::get('/order', 'HomeController@index');

Route::get('/', 'AdminController@index')->name('admin');
Route::get('/admin', 'AdminController@index')->name('admin');

Route::get('/admin/menu/add', 'AdminController@addMenu')->name('admin.menu.add');
Route::get('/admin/menu', 'AdminController@menu')->name('admin.menu');
Route::get('/admin/menu/modify/{id}', 'AdminController@modifyMenu')->name('admin.menu.modify');
Route::post('/admin/menu/modify/{id}', 'AdminController@updateMenu')->name('admin.menu.updateMenu');
Route::post('/admin/menu/create', 'AdminController@createMenu')->name('admin.menu.create');
Route::get('/admin/menu/delete/{id}', 'AdminController@deleteMenu')->name('admin.menu.deleteMenu');

Route::get('/admin/product/add', 'AdminController@addProduct')->name('admin.product.add');
Route::get('/admin/product', 'AdminController@product')->name('admin.product');
Route::get('/admin/product/modify/{id}', 'AdminController@modifyProduct')->name('admin.product.modify');
Route::post('/admin/product/modify/{id}', 'AdminController@updateProduct')->name('admin.product.updateProduct');
Route::post('/admin/product/create', 'AdminController@createProduct')->name('admin.product.create');
Route::get('/admin/product/delete/{id}', 'AdminController@deleteProduct')->name('admin.product.deleteProduct');

//Route::get('/admin/order/add', 'AdminController@addOrder')->name('admin.order.add');
Route::get('/admin/order', 'AdminController@order')->name('admin.order');
Route::get('/admin/order/detail/{id}', 'AdminController@detailOrder')->name('admin.order.modify');
Route::post('/admin/order/detail/{id}', 'AdminController@updateOrder')->name('admin.order.updateOrder');
//Route::post('/admin/order/create', 'AdminController@createOrder')->name('admin.order.create');
//Route::get('/admin/order/delete/{id}', 'AdminController@deleteOrder')->name('admin.order.deleteOrder');

Route::get('/admin/printcode', 'AdminController@printCode')->name('admin.printcode');
Route::get('/admin/showKey', 'AdminController@showKey')->name('admin.showKey');

Route::get('/admin/printer', 'AdminController@printer')->name('admin.printer');
Route::get('/admin/printer/add', 'AdminController@addprinter')->name('admin.printer.add');
Route::get('/admin/printer/modify/{id}', 'AdminController@modifyPrinter')->name('admin.printer.modify');
Route::post('/admin/printer/modify/{id}', 'AdminController@updatePrinter')->name('admin.printer.updatePrinter');
Route::post('/admin/printer/create', 'AdminController@createPrinter')->name('admin.printer.create');
Route::get('/admin/printer/delete/{id}', 'AdminController@deletePrinter')->name('admin.printer.deletePrinter');
//Route::get('/admin/promotion/add', 'PromotionController@addProduct')->name('admin.promotion.add');
//Route::get('/admin/promotion', 'PromotionController@promotion')->name('admin.promotion');
//Route::get('/admin/promotion/modify/{id}', 'PromotionController@modifyPromotion')->name('admin.promotion.modify');
//Route::post('/admin/promotion/modify/{id}', 'PromotionController@updatePromotion')->name('admin.promotion.updateProduct');
//Route::post('/admin/promotion/create', 'PromotionController@createPromotion')->name('admin.promotion.create');
//Route::get('/admin/promotion/delete/{id}', 'PromotionController@deletePromotion')->name('admin.promotion.deleteProduct');

Route::get('/admin/table', 'AdminController@table')->name('admin.table');
Route::post('/admin/orderTable', 'AdminController@orderTable')->name('admin.orderTable');
Route::get('/admin/getOrderTable', 'AdminController@getOrderTable')->name('admin.getOrderTable');
Route::get('/admin/orderTableDetail', 'AdminController@orderTableDetail')->name('admin.orderTableDetail');

Route::post('/admin/orderAddFood', 'AdminController@orderAddFood')->name('admin.orderAddFood');
Route::post('/admin/orderPayment', 'AdminController@orderPayment')->name('admin.orderPayment');

Route::get('/admin/orderTablePrintReceipt', 'PrinterController@orderTablePrintReceipt')->name('admin.orderTablePrintReceipt');


Route::get('/printer', 'PrinterController@index');

Route::get('/admin/getMenuOption', 'AdminController@getMenuOption');

/*********************  Printer  *********************/

Route::get('/getPrint/{count}', 'PrinterController@printKey')->name('getPrint');
Route::get('/printOrder/{id}', 'PrinterController@printOrder')->name('printOrder');

/*********************  End Printer  *********************/

/*********************  Frontend  *********************/

Route::post('/addToList', 'HomeController@getAddToList')->name('addToList');
Route::get('/order/change', 'HomeController@changeQty')->name('change');
Route::get('/order/remove', 'HomeController@remove')->name('remove');
Route::post('/order/confirm', 'HomeController@confirm')->name('confirm');
Route::get('/order/detail', 'HomeController@detail')->name('detail');
Route::get('/order/checkout', 'HomeController@checkout')->name('checkout');
Route::get('/order/order-list', 'HomeController@orderList')->name('orderList');
Route::get('/order/menu', 'HomeController@menu')->name('menu');
Route::post('/order/validCode', 'HomeController@validCode')->name('validCode');
Route::get('/order/kitchen', 'HomeController@kitchen')->name('kitchen');
Route::post('/order/getOrder', 'HomeController@getOrder')->name('getOrder');

/*********************  End Frontend  *********************/

Route::get('/user', 'AdminController@getUser');

/*********************  API  *********************/

Route::get('/getProducts', 'ApiController@getProducts')->name('getProducts');
Route::get('/getTotalProducts', 'ApiController@getTotalProducts')->name('getTotalProducts');
Route::get('/getPrintCode', 'ApiController@getPrintCode')->name('getPrintCode');

/*********************  End API  *********************/