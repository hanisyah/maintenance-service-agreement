<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class schedule_plan extends Model
{
    protected $fillable =['plant_id','project_id','trainset_id','maintenance_id','firstDate'];
    protected $primaryKey ='id_schedule_plan';
    protected $table ='schedule_plan';

    public function plant(){
    	return $this->belongsTo('App\plant','plant_id');
    }

    public function project(){
    	return $this->belongsTo('App\Project','project_id');
    }

    public function trainset(){
    	return $this->belongsTo('App\Trainset','trainset_id');
    }

    public function maintenance(){
    	return $this->belongsTo('App\Maintenance','maintenance_id');
    }
}
