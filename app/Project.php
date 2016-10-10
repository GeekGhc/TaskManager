<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
	protected $fillable = [
		'name','thumbnail'
	];//定义模型的数据表可填入的数据段
    public function user(){
    	//$pro->user()
    	return $this->belongsTo('APP\User');
    }

    public function tasks(){
    	//$pro->tasks()
    	return $this->hasMany('App\Task');
    }
}
