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

Route::redirect('/', '/home', 301);


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




Route::get('/admin/user/login','Admin\LoginController@login');
Route::any('/admin/user/doLogin','Admin\LoginController@doLogin');
Route::any('/admin/user/doLogout','Admin\LoginController@logout');

Route::prefix('admin')->namespace('Admin')->middleware('login')->group(function(){  
  Route::any('/',function () {
      return view('Admin');
  });
  Route::any('/api/logout',"LoginController@logout");
  Route::any('/api/getMemberInfo',"AdminController@getMemberInfo");
  // 用户
  Route::any('/api/user/selUserList',"UserController@getUserList");
  Route::any('/api/user/selUserById',"UserController@getUserDetail");
  
  // 菜单
  Route::any('/api/menu/addMenu',"MenuController@addMenu");
  Route::any('/api/menu/selMenuList',"MenuController@selMenuList");
  Route::any('/api/menu/selMenuById',"MenuController@selMenuById");
  Route::any('/api/menu/updMenuById',"MenuController@updMenuById");
  Route::any('/api/menu/delMenuById',"MenuController@delMenuById");
  
  // 上传图片
  Route::any('/api/upload',"UploadController@uploadImg");
  
  
  // 文章管理
  Route::any('/api/post/addNewPost',"PostManageController@addNewPost");
  Route::any('/api/post/selPostListByParams',"PostManageController@selPostList");
  
  Route::any('/api/post/selPostTypeList',"PostManageController@selPostTypeList");
  Route::any('/api/post/addPostType',"PostManageController@addPostType");
  Route::any('/api/post/delPostType',"PostManageController@delPostType");

});


