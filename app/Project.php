<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Pic;
use App\Trainset;
use App\Scheduleassign;

class Project extends Model
{
    protected $fillable = ['plant_id','lokasi_id','proCode','proName','startDate','endDate','status'];
    protected $primaryKey = 'idProject';

    public function plant(){
    	return $this->belongsTo('App\Plant','plant_id');
    }

    public function lokasi(){
    	return $this->belongsTo('App\lokasi','lokasi_id');
    }

    public function pics(){
        return $this->hasMany(Pic::class,'project_id');
    }

    public function dashboard(){
        return $this->hasMany(dashboard::class,'project_id');
    }

    public function trainsets(){
        return $this->hasMany(Trainset::class,'project_id');
    }

    public function carmaterial(){
        return $this->hasMany(carmaterial::class,'project_id');
    }

    public function schedule_plan(){
        return $this->hasMany(schedule_::class,'project_id');
    }

    public function scheduleassigns(){
        return $this->hasMany(Scheduleassign::class,'project_id');
    }

    public function train_availability(){
        return $this->hasMany(Train_availability::class,'project_id');
    }

    public function train_reliability(){
        return $this->hasMany(Train_reliability::class,'project_id');
    }
}
