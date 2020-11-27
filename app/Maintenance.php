<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Scheduleassign;
use App\maintenance_task;

class Maintenance extends Model
{
    protected $fillable=['id_maintenance','task_id','codeMain','nameMain','noteMain','dayMain','prioMain','colorMain'];
    protected $primaryKey= 'id_maintenance';
    

    public function schedule_plan(){
        return $this->hasMany(schedule_plan::class,'maintenance_id');
    }

    public function schedule_realization(){
        return $this->hasMany(schedule_realization::class,'maintenance_id');
    }

    public function scheduleassigns(){
        return $this->hasMany(Scheduleassign::class,'maintenance_id');
    }

    public function task(){
        return $this->belongsTo('App\Task','task_id');
    }

}
