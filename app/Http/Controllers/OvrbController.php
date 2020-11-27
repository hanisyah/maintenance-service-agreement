<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ovrb;
use App\plant;
use App\lokasi;
use App\Pic;
use App\Project;
use App\Trainset;
use App\Maintenance;
use App\Scheduleassign;

class OvrbController extends Controller
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
        $ovrb = Ovrb::all();
        $plant = plant::all();
        $lokasi = lokasi::all();
        $pic = Pic::all();
        $project = Project::all();
        $trainset = Trainset::all();
        $maintenance = Maintenance::all();
        $scheduleassign = Scheduleassign::all();
        return view('ovrb.index', compact('ovrb','plant','lokasi','pic','project','trainset','maintenance','scheduleassign'));
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
        //
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
    public function destroy($id)
    {
        //
    }
}
