<?php

namespace App\Http\Controllers;

use App\Task;
use Auth;
use App\Project;
use Illuminate\Http\Request;
use App\Http\Requests\CreateTaskRequest;
use App\Http\Requests\EditTaskRequest;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //表示15个任务为一页
        $toDo = Auth::user()->tasks()->where('completed',0)->paginate(2);
        $Done = Auth::user()->tasks()->where('completed',1)->paginate(2);
        $projects = Project::pluck('name','id');
        return view('tasks.index',compact('toDo','Done','projects'));
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


    public function store(CreateTaskRequest $request)
    {
        Task::create([
            'title' => $request->name,
            'project_id' => $request->project
        ]);
        return Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }


    public function update(EditTaskRequest $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->title = $request->title;
        $task->project_id = $request->projectList;
        $task->save();

        return Redirect::back();
    }

    //处理待处理的项目任务
    public function check($id)
    {
        $task = Task::findOrFail($id);
        $task->completed = 1;//设置这个任务已经处理
        $task->save();
        return Redirect::back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Task::find($id)->delete();
        return Redirect::back();//返回首页
    }
}
