<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Transfertool;
use App\Transfermaterial;

class measurement extends Model
{
    protected $table = 'measurement';
    protected $fillable = ['Measurement_Commercial','Measurement_Technical','Measurement_Name_1','Measurement_Name_2'];
    protected $primaryKey = 'id_measurement';

    public function tool()
    {
        return $this->hasMany(tool::class,'measurement_id');
    }
    public function components()
    {
        return $this->hasMany(Component::class,'measurement_id');
    }

    public function stocktool()
    {
        return $this->hasMany(stocktool::class,'measurement_id');
    }

    public function stockmaterial()
    {
        return $this->hasMany(stockmaterial::class,'measurement_id');
    }

    public function materialprojects(){
        return $this->hasMany('App\Materialproject','measurement_id');
    }

    public function carmaterial()
    {
        return $this->hasMany(carmaterial::class,'measurement_id');
    }

    public function transfertools(){
        return $this->hasMany(Transfertool::class,'measurement_id');
    }
    
    public function transfermaterials(){
        return $this->hasMany(Transfermaterial::class,'measurement_id');
    }

}
