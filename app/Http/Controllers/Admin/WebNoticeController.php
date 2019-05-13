<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Surport\Facades\DB;

class WebNoticeController extends Controller
{
    //
    public function editNotice(Request $request)
    {
        $arg = array(
            'title'=>$request->input('title'),
            'content' => $request->input('content')
        );
        $this->updById(1, $arg, 'notice');
    }
    
    public function selNotice()
    {
        $this->selById(1, 'notice');
    }
}
