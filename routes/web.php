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

// /*
// -------------------------------------------------------------------------------------------------------------
// 		定义前台路由组
// -------------------------------------------------------------------------------------------------------------
// */

Route::namespace('Home')->group(function(){
    Route::any('/home', function () {
        return view('Home');
    });
    Route::any('/api/admin/selListByParams/{params}',"HomeController@index");

});

/* 
-------------------------------------------------------------------------------------------------------------
        定义后台路由组
-------------------------------------------------------------------------------------------------------------
*/




Route::get('/admin/user/login','Admin\AdminController@login');
Route::any('/admin/user/doLogin','Admin\AdminController@doLogin');
Route::any('/admin/user/doLogout','Admin\AdminController@logout');

Route::prefix('admin')->namespace('Admin')->middleware('login')->group(function(){  
    Route::any('/',function () {
        return view('Admin');
    });
    Route::any('/api/logout',"AdminController@logout");
    Route::any('/api/user/selUserList/{params}',"AdminController@getUserList");
    Route::any('/api/user/selUserById/{params}',"AdminController@getUserDetail");

});


