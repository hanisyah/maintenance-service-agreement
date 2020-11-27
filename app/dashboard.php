<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\plant;
use App\Project;
use App\lokasi;

class dashboard extends Model
{
    protected $table='dashboard';
    protected $fillable=['plant_id','project_id','lokasi_id'];
    protected $primaryKey = 'id_dashboard';


    public function plant(){
        return $this->belongsTo('App\plant','plant_id');
    }

    public function Project(){
        return $this->belongsTo('App\Project','project_id');
    }

    public function lokasi(){
        return $this->belongsTo('App\lokasi','lokasi_id');
    }
}
