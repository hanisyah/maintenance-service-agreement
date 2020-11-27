<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bad extends Model
{
    protected $fillable =['plant_id','lokasi_id','pic_id','project_id','trainset_id','measurement_id','component_id','stockmaterial_id','carmaterial_id','detail','bad','status'];
    protected $primaryKey ='idBad';

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

    public function measurement(){
    	return $this->belongsTo('App\measurement','measurement_id');
    }

    public function component(){
    	return $this->belongsTo('App\Component','component_id');
    }

    public function stockmaterial(){
    	return $this->belongsTo('App\stockmaterial','stockmaterial_id');
    }

    public function carmaterial(){
    	return $this->belongsTo('App\carmaterial','carmaterial_id');
    }
}
