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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

//ホーム画面表示
Route::get('/', 'ReviewController@index')->name('index');

//レビュー詳細画面表示
Route::get('/show/{id}', 'ReviewController@show')->name('show');

//ログイン時のみ
Route::group(['middleware' => 'auth'], function () {

    //レビュー画面表示
    Route::get('/review', 'ReviewController@create')->name('create');

    //レビュー画面追記
    Route::post('/review/store', 'ReviewController@store')->name('store');
});

//ホーム画面表示
Route::get('/home', 'HomeController@index')->name('home');
