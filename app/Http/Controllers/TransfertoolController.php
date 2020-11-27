<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transfertool;
use App\plant;
use App\lokasi;
use App\Pic;
use App\Measurement;
use App\tool;

class TransfertoolController extends Controller
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
        $transfertool = Transfertool::all();
        $plant = plant::all();
        $lokasi = lokasi::all();
        $pic = Pic::all();
        $measurement = Measurement::all();
        $tool = tool::all();
        return view('transfertool.index', compact('transfertool','plant','lokasi','pic','measurement','tool'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        ///
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Project::create([
            'plant_id' => $request->id_plant,
            'proCode' => $request->proCode,
            'proName' => $request->proName,
            'startDate' => $request->startDate,
            'endDate' => $request->endDate,
            'status' => $request->status
        ]);
        return redirect('/project')->with(['success' => 'Data Project Berhasil Ditambahkan!']);
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
