<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    //用户列表
   public function getUserList(Request $request)
   {
       $pageNum = $request->input('pageNum');
       $pageSize = $request->input('pageSize');
       $reqFormList = $request->input('reqFormList');
       
       $this->selListByParams($pageNum, $pageSize, $reqFormList,'user');
   }
   //用户详情
   public function getUserDetail(Request $request)
   {
       $data =  $request->except('_token') ;
       $id = $data['id'];
       $this->selById($id,'user');
   }
}
