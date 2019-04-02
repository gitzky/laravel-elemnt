<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function addMenu(Request $request)
    {
        $data =  $request->except('_token') ;
        $req = array(
            "name"=>$data['name'],
            "label"=>$data['name'],
            "path"=>$data['path'],
            "icon"=>$data['icon'],
            "icon"=>$data['icon'],
            "sort"=>$data['sort']
        );
        $this->add($req,'menu');
    }
    
    public function selMenuList(Request $request)
    {
        $pageNum = $request->input('pageNum');
        $pageSize = $request->input('pageSize');
        $reqFormList = $request->input('reqFormList');
        
        $this->selListByParams($pageNum, $pageSize, $reqFormList, 'menu');
        
    }
    
    public function selMenuById(Request $request)
    {
       $data =  $request->except('_token') ;
       $id = $data['id'];
       $this->selById($id, 'menu');
        
    }
    
    public function updMenuById(Request $request)
    {
        $data =  $request->except('_token') ;
        $id = $data['id'];
        $req = array(
            "name"=>$data['name'],
            "label"=>$data['name'],
            "path"=>$data['path'],
            "icon"=>$data['icon'],
            "axis"=>$data['axis'],
            "sort"=>$data['sort']
        );
        $this->updById($id,$req, 'menu');
    }
    
    public function delMenuById(Request $request)
    {
        $data =  $request->except('_token') ;
        $id = $data['id'];
        $this->delById($id, 'menu');
    }
}
