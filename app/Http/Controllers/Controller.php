<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    /*
        $data 返回数据
        json数据：
        {
            "code": "0",
            "data": {
                "list": [],
                "pageNum": 1,
                "pageSize": 6,
                "total": 6
            },
            "exception": "success",
            "msg": "成功"
        }
    */
    public function resData($code, $res)
    {
        $data = array(
            "code" => $code,
            "data" => $res,
            "exception" => $code === "0" ? "success" : "error",
            "msg" => $code === "0" ? "成功" : "请求失败",
        );
        return json_encode($data);
    }
    
    // 增
    public function add($req, $code, $res)
    {
        
    }// 删
    public function delById($arg)
    {
        
    }// 改
    public function updById($arg)
    {
        
    }
    //查
    public function selById($arg,$code,$data)
    {
        if($arg!=='undefined') {
            echo $this->resData($code, $data);
        } else {
            echo $this->resData("10020", "请求参数为空");
        }
    }
   
    
}
