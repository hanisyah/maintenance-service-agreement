<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Scheduleassign;

class Trainset extends Model
{
    protected $primaryKey = 'idTrainset';
    protected $fillable = ['plant_id','project_id','setCode','setName','carNumber','carName'];

    public function plant(){
    	return $this->belongsTo('App\Plant','plant_id');
    }

    public function project(){
    	return $this->belongsTo('App\Project','project_id');
    }

    public function carmaterial(){
        return $this->hasMany(carmaterial::class,'trainset_id');
    }

    public function schedule_plan(){
        return $this->hasMany(schedule_plan::class,'trainset_id');
    }

    public function schedule_realization(){
        return $this->hasMany(schedule_realization::class,'trainset_id');
    }

    public function scheduleassigns(){
        return $this->hasMany(Scheduleassign::class,'trainset_id');
    }

    public function Train_availability(){
        return $this->hasMany(Train_availability::class,'trainset_id');
    }
    
    public function Train_reliability(){
        return $this->hasMany(Train_reliability::class,'trainset_id');
    }

}
