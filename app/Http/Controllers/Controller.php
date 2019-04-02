<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function resData($code,$data)
    {
         /*
            返回前台的json数据
            {
                "code": "0",
                "data": {
                    "list": [],//list如果是列表，增加list字段。否则不用
                    "pageNum": 1,
                    "pageSize": 6,
                    "total": 6
                },
                "exception": "success",
                "msg": "成功"
            }
        */
        $response = array(
            "code" => $code,
            "data" => $data,
            "exception" => $code === "0" ? "success" : "error",
            "msg" => $code === "0" ? "成功" : "请求失败",
        );
        return json_encode($response);
    }
    
    // 增
    public function add($arg, $database)
    {
        $res = DB::table($database)->insert($arg); 
        $code = $res ? '0' : '10001';
        echo $this->resData($code, $res);
    }
    
    // 删
    public function delById($arg, $database)
    {
        $res = DB::table($database)->delete($arg);
        $code = $res ? '0' : '10001';
        echo $this->resData($code, $res);
    }
    
    // 改
    public function updById($id, $arg, $database)
    {
       
        $res = DB::table($database)
            ->where('id', $id)
            ->update($arg);
        $code = $res ? '0' : '10001';
        echo $this->resData($code, $res);
    }
    
    //查
    public function selListByParams($pageNum, $pageSize, $reqFormList, $database)
    {
        $pageNum =  $pageNum ? $pageNum : 1;
        $pageSize = $pageSize ? $pageSize : 100;
        $step = ($pageNum - 1) * $pageSize;
        $count = DB::table($database)->count();
        if ($reqFormList) {
            $res = DB::table($database)
                ->skip($step)
                ->take($pageSize)
                ->where($reqFormList)
                ->get();
        } else {
           $res = DB::table($database)
               ->skip($step)
               ->take($pageSize)
               ->get(); 
        }
        $data = array(
            "list" => $res,
            "pageNum" => $pageNum,
            "pageSize" => $pageSize,
            "total" => $count
        );
        $code = $res ? '0' : '10001';
        echo $this->resData($code, $data);
    }
    //查
    public function selById($arg,$database)
    {
       $res = DB::table($database)->where('id','=',$arg)->get()[0];
       $code = $res ? '0' : '10001';
       echo $this->resData($code, $res);
    }
   
    
}
