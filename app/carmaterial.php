<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class carmaterial extends Model
{
    protected $table = 'carmaterial';
    protected $fillable = ['tool_id','plant_id','lokasi_id','measurement_id','project_id','trainset_id'];
    protected $primaryKey = 'id_carMaterial';

    public function plant(){
    	return $this->belongsTo('App\plant','plant_id');
    }

    public function measurement(){
    	return $this->belongsTo('App\measurement','measurement_id');
    }

    public function tool(){
    	return $this->belongsTo('App\tool','tool_id');
    }

    public function lokasi(){
    	return $this->belongsTo('App\lokasi','lokasi_id');
    }

    public function project(){
    	return $this->belongsTo('App\Project','project_id');
    }

    public function trainset(){
    	return $this->belongsTo('App\Trainset','trainset_id');
    }
}
