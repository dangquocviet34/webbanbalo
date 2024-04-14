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




Route::get('/trangchu','App\Http\Controllers\UserController@index')
->name('index');

Route::get('/admin', function () { return redirect('/admin/dashboard'); });
Route::get('/admin/dashboard','App\Http\Controllers\AdminController@dashboard')->name('admin.dashboard');
Route::get('/admin/products', 'App\Http\Controllers\AdminController@products')->name('admin.products');
Route::get('/admin/accounts', 'App\Http\Controllers\AdminController@accounts')->name('admin.accounts');
Route::get('/admin/roles', 'App\Http\Controllers\AdminController@roles')->name('admin.roles');
