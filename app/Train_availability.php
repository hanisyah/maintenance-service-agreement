<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Train_availability extends Model
{
    protected $fillable =['plant_id','lokasi_id','project_id','trainset_id','pic_id'];
    protected $primaryKey ='id_train_availability';
    protected $table = 'train_availabilitys';

    public function plant(){
    	return $this->belongsTo('App\plant','plant_id');
    }

    public function project(){
    	return $this->belongsTo('App\Project','project_id');
    }

    public function trainset(){
    	return $this->belongsTo('App\Trainset','trainset_id');
    }

    public function lokasi(){
    	return $this->belongsTo('App\lokasi','lokasi_id');
    }

    public function pic(){
    	return $this->belongsTo('App\Pic','pic_id');
    }
}
