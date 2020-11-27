<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\dashboard;
use App\plant;
use App\Project;
use App\lokasi;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $dashboard =  dashboard::all();
        $plant = plant::all();
        $project = Project::all();
        $lokasi = lokasi::all();
        return view('dashboard.index', compact('dashboard','plant','project','lokasi'));

        // $project = Project::with('plant')->get();
        // foreach ($project as $a) {
        //   echo $a->plant->nama_plant;
        // }
        
        // return view('dashboard.index', compact('dashboard','plant','project','lokasi'));



    }
}

 