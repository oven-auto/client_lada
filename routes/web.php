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

Route::group(['prefix'=>'admin','namespace'=>'Back'],function(){
	Route::get('/','IssueController@index');
	Route::resource('/issues', 'IssueController');
	Route::resource('/cars', 'CarController');
	Route::resource('/banners','BannerController');
});

Route::get('/monitor','Front\MonitorController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
