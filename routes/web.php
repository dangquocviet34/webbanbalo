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

/*Route::get('/', function () {
    return view('welcome');
});*/

/*Cập nhật tài khoản */
Route::get('/accountpanel','App\Http\Controllers\AccountUserController@accountpanel')
->middleware('auth')->name("account");

Route::post('/saveaccountinfo','App\Http\Controllers\AccountUserController@saveaccountinfo')
->middleware('auth')->name('saveinfo');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/admin', function () { return redirect('/admin/dashboard'); });
Route::get('/admin/dashboard','App\Http\Controllers\AdminController@dashboard')->name('admin.dashboard');
Route::get('/admin/statistics','App\Http\Controllers\AdminController@statistics')->name('admin.statistics');
Route::get('/admin/products', 'App\Http\Controllers\AdminController@products')->name('admin.products');
Route::get('/admin/promotions', 'App\Http\Controllers\AdminController@promotions')->name('admin.promotions');
Route::get('/admin/accounts', 'App\Http\Controllers\AdminController@accounts')->name('admin.accounts');
Route::get('/admin/roles', 'App\Http\Controllers\AdminController@roles')->name('admin.roles');


Route::get('/admin/permissions', 'App\Http\Controllers\AdminController@permissions')->name('admin.permissions');
Route::get('/admin/settings', 'App\Http\Controllers\AdminController@settings')->name('admin.settings');

Route::get('/admin/statistics/filter-by-date','App\Http\Controllers\AdminController@filter_by_date');



Route::get('/admin/transactions','App\Http\Controllers\AdminController@qldonhang')->name("qldonhang");
Route::post('/admin/transactions/huydon/{id}','App\Http\Controllers\AdminController@huydonhang') ->name("huydonhang");

Route::get('/admin/transactions/exportDonHang','App\Http\Controllers\AdminController@exportDonHang')->name("exportDonHang");

//Xem thông tin chi tiết của hóa đơn
Route::get('/admin/transactions/chitietdonhang/{id}','App\Http\Controllers\AdminController@chitietdonhang') ->name("chitietdonhang");
//xuất hóa đơn PDF
Route::get('/admin/transactions/exportPDF/{id}','App\Http\Controllers\AdminController@exportPDF') ->name("exportPDF");







//Khách hàng
Route::get('/','App\Http\Controllers\Controller@index')
->name('index');

Route::get('/users/theloai/{id_sub}', 'App\Http\Controllers\Controller@index1');
Route::get('/users/chitiet/{id_sp}', 'App\Http\Controllers\Controller@chitiet');


//Thêm giỏ hàng
Route::get('/users/cartadd/{id_sp}', 'App\Http\Controllers\Controller@AddCart')->name("addcart");

Route::post('/cart/add','App\Http\Controllers\BookController@cartadd')->name('cartadd');
Route::get('/order','App\Http\Controllers\Controller@order')->name('order');