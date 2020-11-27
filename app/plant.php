<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\lokasi;
use App\Project;
use App\Pic;
use App\Trainset;
use App\Locemloyee;
use App\stocktool;
use App\Materialproject;
use App\Scheduleassign;
use App\Transfertool;
use App\Transfermaterial;

class plant extends Model
{
	protected $table = 'plant';
    protected $fillable = ['nama_plant','kode'];
    protected $primaryKey = 'id_plant';

    public function lokasi(){
	return $this->hasMany('App\lokasi','lokasi_id');
    }

    public function dashboard(){
        return $this->hasMany(dashboard::class,'plant_id');
    }
    
    public function projects(){
        return $this->hasMany(Project::class,'plant_id');
    }

    public function pics(){
        return $this->hasMany(Pic::class,'plant_id');
    }

    public function trainsets(){
        return $this->hasMany(Trainset::class,'plant_id');
    }

    public function locemployees(){
        return $this->hasMany(Locemployee::class,'plant_id');
    }

    public function stocktool(){
        return $this->hasMany(stocktool::class,'plant_id');
    }

    public function stockmaterial(){
        return $this->hasMany(stockmaterial::class,'plant_id');
    }

    public function materialprojects(){
        return $this->hasMany(Materialproject::class,'plant_id');
    }

    public function carmaterial(){
        return $this->hasMany(carmaterial::class,'plant_id');
        }

    public function schedule_plan(){
        return $this->hasMany(schedule_plan::class,'plant_id');
        }

    public function schedule_realization(){
        return $this->hasMany(schedule_realization::class,'plant_id');
        }
    
    public function scheduleassigns(){
        return $this->hasMany(Scheduleassign::class,'plant_id');
    }

    public function Train_availability(){
        return $this->hasMany(Train_availability::class,'plant_id');
    }

    public function Train_reliability(){
        return $this->hasMany(Train_reliability::class,'plant_id');
    }
    
    public function transfertools(){
        return $this->hasMany(Transfertool::class,'plant_id');
    }
    
    public function transfermaterials(){
        return $this->hasMany(Transfermaterial::class,'plant_id');
    }
}

