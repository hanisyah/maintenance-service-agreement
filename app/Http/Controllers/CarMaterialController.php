<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\lokasi;
use App\plant;
use App\measurement;
use App\tool;
use App\trainset;
use App\project;
use App\carmaterial;


class CarMaterialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $carmaterial = carmaterial::all();
        $lokasi = lokasi::all();
        $plant = Plant::all();
        $tool = tool::all();
        $measurement = measurement::all();
        $trainset = trainset::all();
        $project = project::all();
        return view('carmaterial.index',['carmaterial'=>$carmaterial , 'lokasi' => $lokasi, 'plant' => $plant,  'tool' => $tool , 
         'measurement' => $measurement , 'project' =>$project , 'trainset' => $trainset ]);
    }
}
