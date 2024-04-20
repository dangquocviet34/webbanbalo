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
Route::get('/admin/products', 'App\Http\Controllers\AdminController@products')->name('admin.products');
Route::get('/admin/accounts', 'App\Http\Controllers\AdminController@accounts')->name('admin.accounts');
Route::get('/admin/roles', 'App\Http\Controllers\AdminController@roles')->name('admin.roles');
Route::get('/admin/dashboard/filter-by-date','App\Http\Controllers\AdminController@filter_by_date');
Route::get('/','App\Http\Controllers\Controller@index')
->name('index');
