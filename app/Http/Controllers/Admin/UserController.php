<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    //用户列表
   public function getUserList(Request $request, $arg)
   {
      
       $this->selListByParams($arg,'user');
   }
   //用户详情
   public function getUserDetail($arg)
   {
       $arg = json_decode($arg)->id;
       $this->selById($arg,'user');
   }
}
