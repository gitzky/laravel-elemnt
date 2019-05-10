<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;


class PostController extends Controller
{
    //用户列表
    /* post */
    public function addNewPost(Request $request)
    {
        $date = $request->input('date');
        $postType = $request->input('postType');
        $postIntro = $request->input('postIntro');
        $postAuthor = $request->input('postAuthor');
        $newsIntroImg = $request->input('imageUrl');
        $postTitle = $request->input('postTitle');
        $postContent = $request->input('postContent');
        $arg = array(
            "newsTime" => $date,
            "newsKey" => implode(',', $postType),
            "newsType" => implode(',', $postType),
            "newsIntro" => $postIntro,
            "newsAuthor" => $postAuthor,
            "newsIntroImg" => $newsIntroImg,
            "newsName" => $postTitle,
            "newsContent" => $postContent
        );
        $this->add($arg, 'posts');
    }
    
    public function selPostList(Request $request)
    {
        $pageNum = $request->input('pageNum');
        $pageSize = $request->input('pageSize');
        $reqFormList = $request->input('reqFormList');
        
        $this->selListByParams($pageNum, $pageSize, $reqFormList,'posts');
    }
    
    public function selPostById(Request $request)
    {
        $id = $request->input('id');
        $this->selById($id,'posts');
    }
    
    public function delPostById(Request $request)
    {
        $id = $request->input('id');
        $this->delById($id,'posts');
    }
    
    public function updPostById(Request $request)
    {
        $id = $request->input('id');
        $date = $request->input('date');
        $postType = $request->input('postType');
        $postIntro = $request->input('postIntro');
        $postAuthor = $request->input('postAuthor');
        $newsIntroImg = $request->input('imageUrl');
        $postTitle = $request->input('postTitle');
        $postContent = $request->input('postContent');
        $arg = array(
            "newsTime" => $date,
            "newsKey" => implode(',', $postType),
            "newsType" => implode(',', $postType),
            "newsIntro" => $postIntro,
            "newsAuthor" => $postAuthor,
            "newsIntroImg" => $newsIntroImg,
            "newsName" => $postTitle,
            "newsContent" => $postContent
        );
        // var_dump($arg);
        // die;
        $this->updById($id, $arg, 'posts');
    }
    
    
    /* postType */
    
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
    
    public function updPostType(Request $request)
    {
        $arg = array(
            'isChecked' => $request->input('isChecked')
        );
        $this->updById($request->input('id'), $arg, 'post_type');
    }
    public function selPostTypeList(Request $request)
    {
        $pageNum = $request->input('pageNum');
        $pageSize = $request->input('pageSize');
        $reqFormList = $request->input('reqFormList');
        
        $this->selListByParams($pageNum, $pageSize, $reqFormList,'post_type');
    }
    
  
}
