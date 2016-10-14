<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
//        return view('auth.login');
    }

    public function welcome()
    {
        $projects = Auth::user()->projects()->get();
        $user_name = Auth::user()->name;
        return view('welcome',compact('projects','user_name'));

        //获取当前用户的信息
       /* $data = Auth::user()->findOrFail(1);
        dd($data);*/
    }

    public function make()
    {
        /*$path = public_path() . '/thumbnails/' .'aaaa';
        if (is_dir($path)){
            echo "对不起！目录 " . $path . " 已经存在！";
        }else{
            //第三个参数是“true”表示能创建多级目录，iconv防止中文目录乱码
            $res=mkdir(iconv("UTF-8", "GBK", $path),0777,true);
            if ($res){
                echo "目录 $path 创建成功";
            }else{
                echo "目录 $path 创建失败";
            }
        }*/
        $name = Auth::user()->name;
        return $name;
    }
}
