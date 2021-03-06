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

/** 辣鸡路由我自己都不想看 */
Route::post('check/{block}/pass','Api\BlocksController@pass')->name('check.pass');
Route::post('check/{block}/refuse','Api\BlocksController@refuse')->name('check.refuse');

Route::resource('admin','AdminController',['except' => ['show']]);
Route::resource('memo','MemosController');

Route::get('/admins','AdminPagesController@index')->name('admins.index');
Route::get('/admins/login','AdminPagesController@Login')->name('login');
Route::post('/admin/login','AdminPagesController@LoginStore')->name('login.store');
Route::get('/admins/check','AdminPagesController@check')->name('admins.check');
Route::post('/admins/check','AdminPagesController@check')->name('admins.check');
Route::post('/admins/logout','AdminPagesController@Logout')->name('logout');
Route::get('/admin/check/show/{block}','AdminController@show')->name('check.show');

Route::get('/',function (){
    return view('welcome');
});
