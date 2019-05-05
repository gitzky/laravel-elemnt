<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
    // 上传
    public function upload(Request $request)
    {
        $file = $request->file('fileName');
        // var_dump($file);
        // $originalName = $file->getClientOriginalName();
        // //扩展名
        // $ext = $file->getClientOriginalExtension();
        // //MimeType
        // $type = $file->getClientMimeType();
        // //临时绝对路径
        // $realPath = $file->getRealPath();
        // $filename = uniqid().'.'.$ext;
         $files = iconv("UTF-8","gb2312",$file);
     
        //$bool = Storage::disk('uploads')->put($filename,file_get_contents($realPath));
        var_dump($base64_str,$files);
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
