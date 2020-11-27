<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Pic;
use App\Locemployee;

class Employee extends Model
{
    protected $fillable = ['company_id','emID','emName','emPosition','emPhone','emNote'];
    protected $primaryKey = 'idEmployee';

    public function company(){
    	return $this->belongsTo('App\Company','company_id');
    }

    public function pics(){
        return $this->hasMany(Pic::class,'employee_id');
    }

    public function locemployees(){
        return $this->hasMany(Locemployee::class,'employee_id');
    }
}
