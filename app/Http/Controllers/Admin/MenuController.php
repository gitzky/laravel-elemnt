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
            "path"=>$data['url'],
            "icon"=>$data['icon'],
            "axis"=>'',
            "sort"=>$data['sort']
        );
        $this->add($req,'menu');
    }
    
    public function selMenuList(Request $request)
    {
        $data =  $request->except('_token') ;
        $this->selListByParams($data,'menu');
    }
    
    public function selMenuById(Request $request)
    {
        $data =  $request->except('_token') ;
        $id = $data['id'];
        
    }
    
    public function updMenuById(Request $request)
    {
        $data =  $request->except('_token') ;
        $id = $data['id'];
        
    }
}
