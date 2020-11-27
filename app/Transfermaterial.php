<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transfermaterial extends Model
{
    protected $fillable =['plant_id','project_id','lokasi_id','pic_id','measurement_id','stocktool_id'];
    protected $primaryKey ='idTransfermaterial';

    public function plant(){
    	return $this->belongsTo('App\plant','plant_id');
    }

    public function project(){
    	return $this->belongsTo('App\Project','project_idS');
    }

    public function lokasi(){
    	return $this->belongsTo('App\lokasi','lokasi_id');
    }

    public function pic(){
    	return $this->belongsTo('App\Pic','pic_id');
    }

    public function measurement(){
    	return $this->belongsTo('App\Measurement','measurement_id');
    }

    public function stocktool(){
    	return $this->belongsTo('App\Stocktool','stocktool_id');
    }
}
