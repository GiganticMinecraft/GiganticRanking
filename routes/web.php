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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// JMSログイン・ログアウト
Route::get('login/jms', 'Auth\LoginController@redirectToProvider')->name('login');
Route::get('login/jms/callback', 'Auth\LoginController@handleProviderCallback')->name('login_callback');
Route::get('logout/jms', 'Auth\LoginController@logout')->name('logout');
