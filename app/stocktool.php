<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Transfertool;
use App\Transfermaterial;


class stocktool extends Model
{
    protected $primaryKey = 'id_stocktool';
    protected $table = 'stocktool';
    protected $fillable = ['tool_id','plant_id','lokasi_id','measurement_id','all','available','used','locked','required','queue','process'];

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
									
    public function stocktool(){
        return $this->hasMany(stocktool::class,'stocktool_id');
    }

    public function transfertools(){
        return $this->hasMany(Transfertool::class,'stocktoo_idl');
    }
    
    public function transfermaterials(){
        return $this->hasMany(Transfermaterial::class,'stocktoo_idl');
    }
}
