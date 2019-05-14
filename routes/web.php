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
 
// 文件上传到七牛
Route::any('/api/upload','UploadController@uploadFile');

Route::prefix('home')->namespace('Home')->group(function(){
    Route::any('/', function () {
        return view('Home');
    });
    
    Route::any('/api/index/selPostList',"HomeController@selPostList");
    Route::any('/api/index/selNotice',"HomeController@selNotice");
    Route::any('/api/index/selHotTags',"HomeController@selHotTags");
    Route::any('/api/index/selPostById',"HomeController@selPostById");
    


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
  
  
  // 文章管理
  Route::any('/api/post/addNewPost',"PostController@addNewPost");
  Route::any('/api/post/selPostListByParams',"PostController@selPostList");
  Route::any('/api/post/selPostById',"PostController@selPostById");
  Route::any('/api/post/delPostById',"PostController@delPostById");
  Route::any('/api/post/updPostById',"PostController@updPostById");
  
  Route::any('/api/post/selPostTypeList',"PostController@selPostTypeList");
  Route::any('/api/post/addPostType',"PostController@addPostType");
  Route::any('/api/post/delPostType',"PostController@delPostType");
  Route::any('/api/post/updPostType',"PostController@updPostType");
  
  // 站点公告
  Route::any('/api/webNotice/editNotice',"WebNoticeController@editNotice");
  Route::any('/api/webNotice/selNotice',"WebNoticeController@selNotice");

});


