<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class maintenance_task extends Model
{
    protected $fillable=['maintenance_id','task_id'];
    protected $primaryKey= 'id';

    public function maintenance(){
        return $this->belongsTo('App\Maintenance','maintenance_id');
    }
    
    public function task(){
        return $this->belongsTo('App\Task','task_id');
    }
}
