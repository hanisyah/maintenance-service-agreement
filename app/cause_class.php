<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cause_class extends Model
{
    protected $table = 'cause_class';
    protected $fillable = ['Cause_Class_Name'];
    protected $primaryKey = 'id_cause_class';

}
