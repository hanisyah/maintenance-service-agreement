<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tool extends Model
{
    protected $fillable = ['tool_code','tool_name','measurement_id','duration','tool_specification','calibrate'];
    protected $primaryKey = 'id_tool';
    protected $table = 'tool';


    public function measurement(){
    	return $this->belongsTo('App\measurement','measurement_id');
    }

    public function tasks() {
        return $this->hasMany(Task::class,'tool_id');
    }

    public function stocktool() {
        return $this->hasMany(stocktool::class,'tool_id');
    }

    public function stockmaterial() {
        return $this->hasMany(stockmaterial::class,'tool_id');
    }

    public function carmaterial() {
        return $this->hasMany(carmaterial::class,'tool_id');
    }
    
}
