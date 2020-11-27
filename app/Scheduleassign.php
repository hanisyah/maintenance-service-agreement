<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scheduleassign extends Model
{
    protected $fillable =['plant_id','lokasi_id','pic_id','project_id','trainset_id','maintenance_id','approxStart','approxEnd'];
    protected $primaryKey ='idScheduleassign';

    public function plant(){
    	return $this->belongsTo('App\plant','plant_id');
    }

    public function lokasi(){
    	return $this->belongsTo('App\lokasi','lokasi_id');
    }

    public function pic(){
    	return $this->belongsTo('App\Pic','pic_id');
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
