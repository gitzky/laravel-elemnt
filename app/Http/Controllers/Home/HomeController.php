<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
header('Content-type:text/json');
class HomeController extends Controller
{
    //文章列表
    public function index(){
        
	
        $raw_success = array('code' => "0", 'msg' => '验证码正确');
        
        $raw_fail = array('code' => 100023, 'msg' => '验证码错误');
        
        $res_success = json_encode($raw_success);


        echo $res_success;
    }
}
