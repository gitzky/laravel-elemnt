<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /*
        调取公共查询函数参数
        @params
        第一个参数：$arg，从前台接收的参数
        第二个参数：code码；0或其他
        第三个参数：操作哪张表
    */
    public function getMemberInfo()
    {
        $id = session('boId');
        
        $this->selById($id,'user');
    }
   
    
    
    
    




    

}
