<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
header('Content-type:text/json');
class AdminController extends Controller
{
    /*
        调取公共查询函数参数
        @params
        第一个参数：$arg，从前台接收的参数
        第二个参数：code码；0或其他
        第三个参数：操作哪张表
    */
    public function index(Request $request, $arg){
        $arg = json_decode($arg)->id;
        // $this->selListByParams($arg,'0','user');
        $this->selById($arg,'0','user');
    }
    //用户列表
    public function getUserList(Request $request, $arg)
    {
        $this->selListByParams($arg,'0','user');
    }
    //用户详情
    public function getUserDetail($arg)
    {
        $arg = json_decode($arg)->id;
        $this->selById($arg,'0','user');
    }
    
    
    
    
    public function login()
    {
        return view("login",['password'=>'','username'=>'']);
    }
    
     public function doLogin(Request $request)
    {   

        //获取提交的用户名和密码
        $username=$request->except('_token')['userName'];
        $password=$request->except('_token')['password'];

        // 判断提交的用户名在不在数据库中；如果在返回数组，否则返回空数组
        $res = DB::table('user')->where('userName', '=', $username)->get()->toArray();
       
        
        if($res){
            //判断用户的权限和状态
            $userStatus=$res[0]->userStatus;
            $userGrade=$res[0]->userGrade;

            //判断密码是否相等
           if($res[0]->password==$password){
                if($userStatus!='注册会员'){
                    if($userGrade=='正常使用'){

                        //条件都满足可以登录、设置session、并加载跳转到后台首页的方法
                         session(['a_id'=>$res[0]->id]);
                        return redirect('/admin#/admin');

                    }else{
                        //用户状态被限制。不能登录
                        return view("login",['username'=>'用户状态被限制！不能登录','password'=>'']); 
                    }


                }else{
                    //注册会员，不能登录后台！
                     return view("login",['username'=>'注册会员，不能登录后台！','password'=>'']);
                }

           }else{
                //密码和数据库不匹配
                return view("login",['password'=>'the password is wrong','username'=>$username]);
           }
            
        }else{
            //用户名不在数据库中
            return view("login",['username'=>'the user is not found','password'=>'']);
        }

    }



  
    //加载logout退出页
     public function logout()
    {   
        session(['a_id'=>'']);
        $data = array(
            "code"=> '0',
            "data"=> '退出成功',
            "msg"=>'success'
        );
        return json_encode($data);
    }

}
