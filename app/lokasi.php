<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Locemployee;
use App\stocktool;
use App\Scheduleassign;
use App\Transfertool;
use App\Transfermaterial;

class lokasi extends Model
{
    protected $guarded = ['id_lokasi','created_at','updated_at'];
    protected $table = 'lokasi';
    protected $fillable = ['plant_id','nama_lokasi'];
    protected $primaryKey = 'id_lokasi';


    public function plant(){
    	return $this->belongsTo('App\plant','plant_id');
    }

    public function locemployees(){
        return $this->hasMany(Locemployee::class,'location_id');
    }

    public function stocktool()
    {
        return $this->hasMany(stocktool::class,'lokasi_id');
    }

    public function stockmaterial()
    {
        return $this->hasMany(stockmaterial::class,'lokasi_id');
    }

    public function carmaterial()
    {
        return $this->hasMany(carmaterial::class,'lokasi_id');
    }

    public function scheduleassigns(){
        return $this->hasMany(Scheduleassign::class,'lokasi_id');
    }

    public function Train_availability(){
        return $this->hasMany(train_availability::class,'lokasi_id');
    }

    public function Train_reliability(){
        return $this->hasMany(train_reliability::class,'lokasi_id');
    }

    public function transfertools(){
        return $this->hasMany(Transfertool::class,'lokasi_id');
    }

    public function transfermaterials(){
        return $this->hasMany(Transfermaterial::class,'plant_id');
    }
}
