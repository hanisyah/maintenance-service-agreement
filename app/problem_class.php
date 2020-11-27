<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class problem_class extends Model
{
    protected $table = 'problem_class';
    protected $fillable = ['Problem_Class_Name'];
    protected $primaryKey = 'id_problem_class';

}
