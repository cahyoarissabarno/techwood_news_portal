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

Auth::routes();

Route::middleware('auth')->group(function(){
    Route::get('/Userpage','HomeController@userPage')->name('user')->middleware('role:user');
    Route::post('/Userpage/delete','HomeController@userPageDel')->middleware('role:user');
    Route::post('/simpan','HomeController@simpan')->middleware('role:user');
    Route::post('/admin/reset', 'AdminController@reset')->middleware('role:admin');
    Route::get('/admin/cari', 'AdminController@cari')->middleware('role:admin');
    Route::resource('admin', 'AdminController')->middleware('role:admin');
    Route::get('/content-writer/cari', 'ArticleController@cari')->middleware('role:content-writer');
    Route::post('/content-writer/ganti-password', 'ArticleController@ganti')->middleware('role:content-writer');
    Route::resource('content-writer','ArticleController')->middleware('role:content-writer');
    Route::get('/tag/cari', 'TagController@cari')->middleware('role:admin');
    Route::resource('tag','TagController')->middleware('role:admin');
});

Route::get('/', 'HomeController@index')->name('home');
Route::get('/article/{slug}', 'HomeController@article')->name('article');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/contact', 'HomeController@contact')->name('contact');

