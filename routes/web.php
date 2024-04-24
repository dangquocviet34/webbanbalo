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
require __DIR__ . '/admin.php';








Route::get('/', 'App\Http\Controllers\Controller@index')
    ->name('index');


Route::get('/users/theloai/{id_sub}', 'App\Http\Controllers\Controller@index1');
Route::get('/users/chitiet/{id_sp}', 'App\Http\Controllers\Controller@chitiet');


//Thêm giỏ hàng
Route::get('/users/cartadd/{id_sp}', 'App\Http\Controllers\Controller@AddCart')->name("addcart");

Route::post('/cart/add','App\Http\Controllers\BookController@cartadd')->name('cartadd');
Route::get('/order','App\Http\Controllers\Controller@order')->name('order');
