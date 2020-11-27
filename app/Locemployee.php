<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locemployee extends Model
{
    protected $primaryKey = 'idLocemployee';
    protected $fillable = ['plant_id','location_id','employee_id','responsible','status'];

    public function plant(){
    	return $this->belongsTo('App\Plant','plant_id');
    }

    public function location(){
    	return $this->belongsTo('App\Lokasi','location_id');
    }

    public function employee(){
    	return $this->belongsTo('App\Employee','employee_id');
    }
}
