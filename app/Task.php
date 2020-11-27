<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['tool_id','taskName','taskNote'];
    protected $primaryKey = 'idTask';

    public function tool(){
    	return $this->belongsTo('App\Tool','tool_id');
    }

    public function maintenance_task(){
        return $this->hasMany('App\maintenance_task','task_id');
    }

    // public function maintenance(){
    //     return $this->belongsToMany('App\Maintenance');
    // }
}
