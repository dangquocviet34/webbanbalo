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
Route::get('/accountpanel', 'App\Http\Controllers\AccountUserController@accountpanel')
    ->middleware('auth')->name("account");

Route::post('/saveaccountinfo', 'App\Http\Controllers\AccountUserController@saveaccountinfo')
    ->middleware('auth')->name('saveinfo');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::get('/admin', function () {
    return redirect('/admin/dashboard');
});
Route::get('/admin/dashboard', 'App\Http\Controllers\AdminController@dashboard')->name('admin.dashboard');
Route::get('/admin/statistics', 'App\Http\Controllers\AdminController@qldonhang')->name('admin.statistics');
Route::get('/admin/products', 'App\Http\Controllers\AdminController@products')->name('admin.products');
Route::get('/admin/promotions', 'App\Http\Controllers\AdminController@promotions')->name('admin.promotions');
Route::get('/admin/accounts', 'App\Http\Controllers\AdminController@accounts')->name('admin.accounts');
Route::get('/admin/roles', 'App\Http\Controllers\AdminController@roles')->name('admin.roles');
Route::get('/admin/permissions', 'App\Http\Controllers\AdminController@permissions')->name('admin.permissions');
Route::get('/admin/settings', 'App\Http\Controllers\AdminController@settings')->name('admin.settings');

Route::post('/admin/statistics/filter-by-date', 'App\Http\Controllers\AdminController@filter_by_date');
Route::post('/admin/dashboard/filter-by-date', 'App\Http\Controllers\AdminController@filter_by_date');

Route::get('/admin/account/profile', 'App\Http\Controllers\AdminController@account_profile')->name('admin.account.profile');
Route::get('/admin/account/edit', 'App\Http\Controllers\AdminController@account_edit')->name('admin.account.edit');
Route::post('/admin/account/delete', 'App\Http\Controllers\AdminController@account_delete')->name('admin.account.delete');
Route::get('/admin/account/create', 'App\Http\Controllers\AdminController@account_create')->name('admin.account.create');
Route::post('/admin/account/save/{action}', 'App\Http\Controllers\AdminController@account_save')->name("admin.account.save");

Route::get('/admin/role/view', 'App\Http\Controllers\AdminController@role_view')->name('admin.role.view');
Route::get('/admin/role/edit', 'App\Http\Controllers\AdminController@role_edit')->name('admin.role.edit');
Route::post('/admin/role/delete', 'App\Http\Controllers\AdminController@role_delete')->name('admin.role.delete');
Route::get('/admin/role/reate', 'App\Http\Controllers\AdminController@role_create')->name('admin.role.create');

Route::get('/admin/product/view', 'App\Http\Controllers\AdminController@product_view')->name('admin.product.view');
Route::get('/admin/product/edit', 'App\Http\Controllers\AdminController@product_edit')->name('admin.product.edit');
Route::post('/admin/product/delete', 'App\Http\Controllers\AdminController@product_delete')->name('admin.product.delete');
Route::get('/admin/product/create', 'App\Http\Controllers\AdminController@product_create')->name('admin.product.create');
Route::post('/admin/product/save', 'App\Http\Controllers\AdminController@product_save')->name("admin.product.save");

Route::get('/admin/transactions', 'App\Http\Controllers\AdminController@qldonhang')->name("qldonhang");
Route::post('/admin/transactions/huydon/{id}', 'App\Http\Controllers\AdminController@huydonhang')->name("huydonhang");

Route::get('/admin/transactions/exportDonHang', 'App\Http\Controllers\AdminController@exportDonHang')->name("exportDonHang");

//Xem thông tin chi tiết của hóa đơn
Route::get('/admin/transactions/chitietdonhang/{id}', 'App\Http\Controllers\AdminController@chitietdonhang')->name("chitietdonhang");
//xuất hóa đơn PDF
Route::get('/admin/transactions/exportPDF/{id}', 'App\Http\Controllers\AdminController@exportPDF')->name("exportPDF");









Route::get('/', 'App\Http\Controllers\Controller@index')
    ->name('index');


Route::get('/users/theloai/{id_sub}', 'App\Http\Controllers\Controller@index1');
Route::get('/users/chitiet/{id_sp}', 'App\Http\Controllers\Controller@chitiet');


//Thêm giỏ hàng
Route::get('/users/cartadd/{id_sp}', 'App\Http\Controllers\Controller@AddCart')->name("addcart");

Route::post('/cart/add','App\Http\Controllers\BookController@cartadd')->name('cartadd');
Route::get('/order','App\Http\Controllers\Controller@order')->name('order');

Route::post('/save-cart','App\Http\Controllers\Controller@save_cart_ajax')->name('save_cart_ajax');
Route::post('/add-cart-ajax','App\Http\Controllers\Controller@add_cart_ajax')->name('add-cart-ajax');
Route::get('/giohang','App\Http\Controllers\Controller@giohang')->name('giohang');
Route::get('/delete_cart/{session_id}','App\Http\Controllers\Controller@delete_cart')->name('delete_cart');
Route::post('/order/create','App\Http\Controllers\Controller@ordercreate')->middleware(['auth'])->name('ordercreate');