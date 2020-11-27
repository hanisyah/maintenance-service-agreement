<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Scheduleassign;
use App\plant;
use App\lokasi;
use App\Pic;
use App\Project;
use App\Trainset;
use App\Maintenance;

class ScheduleassignController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scheduleassign = Scheduleassign::all();
        $plant = plant::all();
        $lokasi = lokasi::all();
        $pic = Pic::all();
        $project = Project::all();
        $trainset = Trainset::all();
        $maintenance = Maintenance::all();
        return view('scheduleassign.index', compact('scheduleassign','plant','lokasi','pic','project','trainset','maintenance'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Scheduleassign::create([
            'plant_id' => $request->id_plant,
            'lokasi_id' => $request->id_lokasi,
            'pic_id' => $request->idPic,
            'project_id' => $request->idProject,
            'trainset_id' => $request->idTrainset,
            'maintenance_id' => $request->id_maintenance,
            'approxStart' => $request->approxStart,
            'approxEnd' => $request->approxEnd
        ]);
        return redirect('/scheduleassign')->with(['success' => 'Data Schedule Assign Berhasil Ditambahkan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Scheduleassign $scheduleassign)
    {
        // dd($scheduleassign);
        Scheduleassign::destroy($scheduleassign->idScheduleassign);
        return redirect('/scheduleassign')->with(['success' => 'Data Schedule Assign Berhasil Dihapus!']);
    }
}
