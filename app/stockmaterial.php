<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class stockmaterial extends Model
{
    protected $primaryKey = 'id_stockmaterial';
    protected $table = 'stockmaterial';
    protected $fillable = ['tool_id','component_id','plant_id','lokasi_id','measurement_id','all','available','used','locked','required','queue','process'];

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
            
    public function component(){
    	return $this->belongsTo('App\Component','component_id');
    }
}
