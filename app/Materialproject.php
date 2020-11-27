<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materialproject extends Model
{
    protected $primaryKey = 'idMaterialProject';
    protected $fillable = ['plant_id','project_id','measurement_id','component_id','pic_id','level'];

    public function plant(){
    	return $this->belongsTo('App\Plant','plant_id');
    }

    public function project(){
    	return $this->belongsTo('App\Project','project_id');
    }

    public function measurement(){
    	return $this->belongsTo('App\Measurement','measurement_id');
    }

    public function component(){
    	return $this->belongsTo('App\Component','component_id');
    }

    public function pic(){
    	return $this->belongsTo('App\Pic','pic_id');
    }
}
