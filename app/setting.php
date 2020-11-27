<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class setting extends Model
{
    protected $primaryKey = 'id_setting';
    protected $fillable = ['key','value','setting'];
}
