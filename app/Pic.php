<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Scheduleassign;
use App\Transfertool;
use App\Transfermaterial;

class Pic extends Model
{
    protected $primaryKey = 'idPic';
    protected $fillable = ['plant_id','project_id','employee_id','status'];

    public function plant(){
    	return $this->belongsTo('App\Plant','plant_id');
    }

    public function project(){
    	return $this->belongsTo('App\Project','project_id');
    }

    public function employee(){
    	return $this->belongsTo('App\Employee','employee_id');
    }
    public function materialprojects(){
    	return $this->hasMany('App\Materialproject','pic_id');
    }

    public function scheduleassigns(){
        return $this->hasMany(Scheduleassign::class,'pic_id');
    }

    public function Train_availability(){
        return $this->hasMany(Train_availability::class,'pic_id');
    }

    public function Train_reliability(){
        return $this->hasMany(Train_reliability::class,'pic_id');
    }

    public function transfertools(){
        return $this->hasMany(Transfertool::class,'pic_id');
    }
    
    public function transfermaterials(){
        return $this->hasMany(Transfermaterial::class,'pic_id');
    }
}
