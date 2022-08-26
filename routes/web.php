<?php

use App\Http\Controllers\AdminController;
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

Route::get('/', 'HomepageController@index');
Route::get('/search','HomepageController@search');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/homepage', 'HomepageController@homepage');

//order
Route::get('/detail/{id}', 'MemberController@index')->middleware('rolemember');
Route::post('/detail/{id}', 'MemberController@order');

Route::get('/editcart/{id}','MemberController@edit')->middleware('rolemember');
Route::post('/editcart', 'MemberController@editcart')->middleware('rolemember');
Route::post('/deletecart', 'MemberController@deletecart')->middleware('rolemember');
Route::get('/cart/{id}', 'MemberController@cart')->middleware('rolemember');

//history
Route::get('/history/{id}', 'MemberController@history')->middleware('rolemember');
Route::get('/addhistory', 'MemberController@checkout');


//admin

Route::get('/admin/newstationery', 'AdminController@insertview')->middleware('roleadmin');
Route::post('/admin/newstationery','AdminController@add');

Route::get('/admin/newtype', 'AdminController@typeview')->middleware('roleadmin');
Route::post('/admin/newtype','AdminController@addtype');

Route::get('/admin/updatetype', 'AdminController@updatetypeview')->middleware('roleadmin');
Route::post('/admin/updatetype','AdminController@updatetype');

Route::get('/admin/homepageadmin', 'HomepageController@homepageadmin')->middleware('roleadmin');

Route::get('/admin/updatestationery/{id}', 'AdminController@updatestationeryview')->middleware('roleadmin');
Route::post('/deletestationery', 'AdminController@deletestationery');

Route::get('/admin/editstationery/{id}', 'AdminController@editstationery')->middleware('roleadmin');
Route::post('/admin/editstationery/{id}', 'AdminController@edits');
