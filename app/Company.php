<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['comShortname','comName','comAddress','comPhone'];
    protected $primaryKey = 'idCompany';

    public function employees()
    {
        return $this->hasMany(Employee::class,'company_id');
    }
}
