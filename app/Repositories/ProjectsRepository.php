<?php
namespace App\Repositories;

use App\Project;
use Illuminate\Support\Facades\Auth;
use Image;

class ProjectsRepository
{
    public function newProject($request)
    {
        //创建当前用户的项目
        $request->user()->projects()->create([
            'name' => $request->name,
            'thumbnail' => $this->thumbnail($request)
        ]);
    }

    public function thumbnail($request)
    {
        if ($request->hasFile('thumbnail')) {
            //使用image组件
            $file = $request->thumbnail;
            $name = str_random(10) . '.jpg';
            $user_name = Auth::user()->name;
            $path = public_path() . '/thumbnails/' . $user_name . '/' . $name;
            Image::make($file)->resize(261, 98)->save($path);

            return $name;
        }
    }

    public function updateProject($request, $id)
    {
        $project = Project::findOrFail($id);
        $name = $project->thumbnail;
        $user_name = Auth::user()->name;
        $path = public_path() . '/thumbnails/' . $user_name . '/' . $name;
        $res = unlink($path);
        if ($res) {
            $project->name = $request->name;
            if ($request->hasFile('thumbnail')) {
                $project->thumbnail = $this->thumbnail($request);
            }
            $project->save();
        }
    }
}