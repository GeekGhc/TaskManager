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
    }

    public function welcome()
    {
        $projects = Auth::user()->projects()->get();
        return view('welcome',compact('projects'));

        //获取当前用户的信息
       /* $data = Auth::user()->findOrFail(1);
        dd($data);*/
    }
}
