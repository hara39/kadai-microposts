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
//ユーザー登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

//ユーザー認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::get('login', 'Auth\LoginController@Login')->name('login.post');
Route::get('logout', 'Auth\RegisterController@logout')->name('logout.get');
