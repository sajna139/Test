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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',"ProductController@Createproduct");

Route::post('product_added',"ProductController@Addproduct");

Route::get('list_product',"ProductController@Showproduct");

Route::get('product/{id}/view', ['as' => 'product.view', 'uses' => 'ProductController@view']);

Route::get('product/{id}/edit', ['as' => 'product.edit', 'uses' => 'ProductController@edit']);

Route::post('product/{id}/update', ['as' => 'product.update', 'uses' => 'ProductController@update']);

Route::get('product/{id}/delete', ['as' => 'product.delete', 'uses' => 'ProductController@destroy']);

Route::get('add-sales',"SalesController@add");

Route::post('sales-added', ['as' => 'sales.add', 'uses' => 'SalesController@added']);

Route::get('sales-list', ['as' => 'sales.list', 'uses' => 'SalesController@list']);

Route::get('reports/sales', ['as' => 'sales.reports', 'uses' => 'SalesController@sales_report']);

Route::post('reports/sales/result', ['as' => 'sales.reports.result', 'uses' => 'SalesController@sales_report_result']);
