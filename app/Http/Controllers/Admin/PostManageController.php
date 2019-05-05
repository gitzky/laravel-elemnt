<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostManageController extends Controller
{
    //用户列表
    
    public function selPostList(Request $request)
    {
        $pageNum = $request->input('pageNum');
        $pageSize = $request->input('pageSize');
        $reqFormList = $request->input('reqFormList');
        
        $this->selListByParams($pageNum, $pageSize, $reqFormList,'posts');
    }
    
    public function addPostType(Request $request)
    {
        $req = array(
            "code"=>$request->input('code'),
            "type"=>$request->input('type')
        );
        $this->add($req,'post_type');
    }
    
    public function delPostType(Request $request)
    {
        
        $this->delById($request->input('id'),'post_type');
    }
    
    public function addNewPost(Request $request)
    {
        $filename = $request->input('filename');
        $extension = $request->input('extension');
        // 取到磁盘实例
        $disk = Storage::disk('local');
        $newFileName = time() . "." . $extension;    //重命名
        // 移动文件
        $res = $disk->move('/Temp/'.$filename.'.'.$extension, '/images/'.$newFileName);
        var_dump($res);
        
    }
    public function selPostTypeList(Request $request)
    {
        $pageNum = $request->input('pageNum');
        $pageSize = $request->input('pageSize');
        $reqFormList = $request->input('reqFormList');
        
        $this->selListByParams($pageNum, $pageSize, $reqFormList,'post_type');
    }
    
  
}
