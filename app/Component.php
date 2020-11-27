<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    protected $fillable = ['type','code','name','measurement_id','minStock','normalDuration','leadTime','specification'];
    protected $primaryKey = 'idComponent';

    public function measurement(){
    	return $this->belongsTo('App\measurement','measurement_id');
    }

    public function stockmaterial() {
        return $this->hasMany(stockmaterial::class,'component_id');
    }
}
