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
        // 取到磁盘实例
        $disk = Storage::disk('local');
        
        $filename = $request->input('filename');
        $extension = $request->input('extension');
        $date = $request->input('date');
        $postAuthor = $request->input('postAuthor');
        $postIntro = $request->input('postIntro');
        $postContent = $request->input('postContent');
        $postTitle = $request->input('postTitle');
        $postType = $request->input('postType');
        $newFileName = time() . "." . $extension;    //重命名
        $newPath = '/images/'.$newFileName; // 保存路径+名字
        // 移动文件
        $res = $disk->move('/Temp/'.$filename.'.'.$extension, $newPath);
        if ($res) {
            $arg = array(
                "newsName" => $postTitle,
                "newsAuthor" => $postAuthor,
                "newsTime" => $date,
                "newsIntro" => $postIntro,
                "newsIntroImg" => $newPath,
                "newsContent" => $postContent,
                "newsType" => $postType,
                "newsKey" => $postType
            );
            $this->add($arg, 'posts');
        }
    }
    public function selPostTypeList(Request $request)
    {
        $pageNum = $request->input('pageNum');
        $pageSize = $request->input('pageSize');
        $reqFormList = $request->input('reqFormList');
        
        $this->selListByParams($pageNum, $pageSize, $reqFormList,'post_type');
    }
    
  
}
