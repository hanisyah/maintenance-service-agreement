<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transfertool extends Model
{
    protected $fillable =['plant_id','lokasi_id','pic_id','measurement_id','tool_id'];
    protected $primaryKey ='idTransfertool';

    public function plant(){
    	return $this->belongsTo('App\plant','plant_id');
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
    	return $this->belongsTo('App\tool','tool_id');
    }
}
