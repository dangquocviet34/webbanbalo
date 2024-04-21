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

Route::get('/admin', function () { return redirect('/admin/dashboard'); });
Route::get('/admin/dashboard','App\Http\Controllers\AdminController@dashboard')->name('admin.dashboard');
Route::get('/admin/products', 'App\Http\Controllers\AdminController@products')->name('admin.products');
Route::get('/admin/accounts', 'App\Http\Controllers\AdminController@accounts')->name('admin.accounts');
Route::get('/admin/roles', 'App\Http\Controllers\AdminController@roles')->name('admin.roles');
Route::post('/admin/dashboard/filter-by-date','App\Http\Controllers\AdminController@filter_by_date');

Route::get('/admin/transactions','App\Http\Controllers\AdminController@qldonhang')->name("qldonhang");
Route::post('/admin/transactions/huydon/{id}','App\Http\Controllers\AdminController@huydonhang') ->name("huydonhang");

Route::get('/admin/transactions/exportDonHang','App\Http\Controllers\AdminController@exportDonHang')->name("exportDonHang");

//Xem thông tin chi tiết của hóa đơn
Route::get('/admin/transactions/chitietdonhang/{id}','App\Http\Controllers\AdminController@chitietdonhang') ->name("chitietdonhang");
//xuất hóa đơn PDF
Route::get('/admin/transactions/exportPDF/{id}','App\Http\Controllers\AdminController@exportPDF') ->name("exportPDF");






Route::get('/','App\Http\Controllers\Controller@index')
->name('index');

