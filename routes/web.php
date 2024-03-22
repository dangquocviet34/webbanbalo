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

Route::get("/vidu1","App\Http\Controllers\ViDuController@vidu");
Route::get("/qlsach/theloai","App\Http\Controllers\BookController@laythongtintheloai");
Route::get("/qlsach/thongtinsach","App\Http\Controllers\BookController@laythongtinsach");
Route::get("chucnang2","App\Http\Controllers\BookController@chucnang2");

Route::get("/chucnang1", "App\Http\Controllers\ViDuController@chucnang1");
Route::get("/chucnang6", "App\Http\Controllers\ViDuController@chucnang6");
Route::get("/chucnang4", "App\Http\Controllers\ViDuController@chucnang4");
