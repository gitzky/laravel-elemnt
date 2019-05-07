<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
    // 上传
    public function upload()
    {
        $file = $_FILES['upfile'];
        // if ($_FILES["file"]["error"] == 0) {
        //     //上传文件到CDN
        //     $res = array(
        //         "state"    => "",          //上传状态，上传成功时必须返回"SUCCESS"
        //         "url"      => "",            //CDN地址
        //         "title"    => "",          //新文件名
        //         "original" => "",       //原始文件名
        //         "type"     => "",           //文件类型
        //         "size"     => "",           //文件大小
        //     );
        //     
        // }

        $res = array(
           "original" => "t_15142885945a4235d20401d.jpg",
           "size" => 47897,
           "state" => "SUCCESS",
           "title" => "1557230468209586.jpg",
           "type" => ".jpg",
           "url" => "/storage/image/20190507/1557230468209586.jpg"
        );
        echo json_encode($res);
    }
    
    public function uploadImg(Request $request)
    {   
        //执行上传图像
        if ($request->hasFile('fileName')) {
            $file = $request->file('fileName');  //获取UploadFile实例
            if ( $file->isValid()) { //判断文件是否有效
                //$filename = $file->getClientOriginalName(); //文件原名称
                $extension = $file->getClientOriginalExtension(); //扩展名
                $filename =  "default." . $extension;    //重命名
                // $path=base_path("/public/img\uploads");
                $path = public_path("uploads\Temp");
                $res = $file->move($path, $filename); //移动至指定目录
            }
        }else{
            $res = false;
        }
        
        $code = $res ? "0" : "-1";
     
        $response = array(
            "code" => $code,
            "data" => array(
                "filename"=>"default",
                "extension"=>$extension,
            ),
            "exception" => $code === "0" ? "success" : "error",
            "msg" => $code === "0" ? "成功" : "请求失败",
        );
        return $response;   
    }
    
    
}
