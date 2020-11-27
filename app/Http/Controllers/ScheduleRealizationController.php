<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\plant;
use App\Trainset;
use App\Maintenance;
use App\schedule_realization;

class ScheduleRealizationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        
        $schedule_realization = schedule_realization::all();
        $trainset = Trainset::all();
        $maintenance = Maintenance::all();
        $project = Project::all();
        $plant = plant::all();
        return view('schedule_realization.index', compact('schedule_realization','trainset','maintenance','project','plant')); 
    }

    public function store(Request $request)
    {
        schedule_realization::create([
            'plant_id' => $request->id_plant,
            'project_id' => $request->idProject,
            'trainset_id' => $request->idTrainset,
            'maintenance_id' => $request->id_maintenance,
            'firstDate' => $request->firstDate
        ]);
        return redirect('/schedule_realization')->with(['success' => 'Data Schedule Realization Berhasil Ditambahkan!']);
    }
}
