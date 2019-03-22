<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
header('Content-type:text/json');
class HomeController extends Controller
{
    //文章列表
    public function index(Request $request, $arg){
        $code = '0';
        $item = array(
        "canVisit" => 1,
        "decription" => "111",
        "name" => "超级管理员"
        );
        $list[] = $item;
        $list[] = $item;
        $list[] = $item;
        $data = array(
            "list" => $list,
            "pageNum" => 1,
            "pageSize" => 10,
            "total" => 1
        );
        // $data = json_encode($data);
        $this->selById($arg,$code,$data);
    }
}
