<?php

use Illuminate\Support\Facades\Route;


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
Route::post('/admin/product/save/{action}', 'App\Http\Controllers\AdminController@product_save')->name("admin.product.save");

Route::get('/admin/transactions', 'App\Http\Controllers\AdminController@qldonhang')->name("qldonhang");
Route::post('/admin/transactions/huydon/{id}', 'App\Http\Controllers\AdminController@huydonhang')->name("huydonhang");

Route::get('/admin/transactions/exportDonHang', 'App\Http\Controllers\AdminController@exportDonHang')->name("exportDonHang");

//Xem thông tin chi tiết của hóa đơn
Route::get('/admin/transactions/chitietdonhang/{id}', 'App\Http\Controllers\AdminController@chitietdonhang')->name("chitietdonhang");
//xuất hóa đơn PDF
Route::get('/admin/transactions/exportPDF/{id}', 'App\Http\Controllers\AdminController@exportPDF')->name("exportPDF");
