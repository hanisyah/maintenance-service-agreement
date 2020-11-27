<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catalogtool extends Model
{
    protected $primaryKey = 'idCatalogtool';
    protected $fillable = ['plant_id','location_id','pic_id','measurement_id','tool_id','stocktool_id'];

    public function plant(){
    	return $this->belongsTo('App\Plant','plant_id');
    }

    public function location(){
    	return $this->belongsTo('App\Location','location_id');
    }

    public function pic(){
    	return $this->belongsTo('App\Pic','pic_id');
    }

    public function measurement(){
    	return $this->hasMany('App\Measurement','tool_id');
    }
    public function tool(){
    	return $this->hasMany('App\Tool','tool_id');
    }
    public function stocktool(){
    	return $this->hasMany('App\Stocktool','stocktool_id');
    }
}
