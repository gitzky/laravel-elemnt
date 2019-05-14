<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
    public function selPostById(Request $request){
        $arg = $request->input('id');
        $this->selById($arg,'posts');
    }
    
    public function selPostList(Request $request)
    {
        $pageNum = $request->input('pageNum');
        $pageSize = $request->input('pageSize');
        $reqFormList = $request->input('reqFormList');
        $this->selListByParams($pageNum,$pageSize,$reqFormList,'posts');
    }
    
    public function selNotice()
    {
        $this->selById(1, 'notice');
    }
    
    public function selHotTags(Request $request)
    {
        $pageNum = 1;
        $pageSize = 100;
        $reqFormList = array(
            'isChecked' => 1
        );
        $this->selListByParams($pageNum, $pageSize, $reqFormList, 'post_type');
    }
    
    
}


