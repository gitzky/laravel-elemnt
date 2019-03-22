<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
header('Content-type:text/json');
class HomeController extends Controller
{
    /*
        调取公共查询函数参数
        @params
        第一个参数：$arg，从前台接收的参数
        第二个参数：code码；0或其他
        第三个参数：操作哪张表
    */
    //文章列表
    public function index(Request $request, $arg){
        $arg = json_decode($arg)->id;
        // $this->selListByParams($arg,'0','user');
        $this->selById($arg,'0','user');
    }
}
