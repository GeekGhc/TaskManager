<?php

namespace App\Http\Controllers;

use App\Project;
use App\Task;
use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;
use Illuminate\Support\Facades\Redirect;
use Image;
use App\Repositories\ProjectsRepository;
use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\EditProjectRequest;

class ProjectsController extends Controller
{
    protected $Repo;
    //注入一个外部类ProjectsRepository
    public function __construct(ProjectsRepository $repo)
    {
        $this->Repo = $repo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "string";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function store(CreateProjectRequest $request)
    {
        //laravel的表单验证
       /* $this->validate($request,[

        ]);*/


        $this->Repo->newProject($request);

        return back();
        //获取当前用户的一些字段信息
        // return $request->user()->email;
    }


    public function show($name)
    {
        //获取当前用户的指定工程
        $project = Auth::user()->projects()->where('name',$name)->first();
        $toDo = $project->tasks()->where('completed',0)->get();
        $Done = $project->tasks()->where('completed',1)->get();
//        $projects = Auth::user()->projects()->get();
        $projects = Project::pluck('name','id');
        return view('projects.show',compact('project','toDo','Done','projects'));
//                dd($project->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }


    public function update(EditProjectRequest $request, $id)
    {
        $this->Repo->updateProject($request,$id);
        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Project::find($id)->delete();
        return Redirect::back();//返回首页
    }
}
