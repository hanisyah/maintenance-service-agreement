<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Measurement;
use Illuminate\Support\Facades\DB;


class MeasurementController extends Controller
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
        $measurement = Measurement::all();
        return view('measurement.index', ['measurement' => $measurement]); 
    }
  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Measurement::create($request->all());
        return redirect('/measurement')->with(['success' => 'Data Measurement Berhasil Ditambahkan!']);
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
    public function edit(Measurement $measurement)
    {
        return view('measurement/edit', ['measurement' => $measurement]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Measurement $measurement)
    {
        Measurement::where('id_measurement', $measurement->id_measurement)
            ->update([
                'Measurement_Commercial' => $request->Measurement_Commercial,
                'Measurement_Technical' => $request->Measurement_Technical,
                'Measurement_Name_1' => $request->Measurement_Name_1,
                'Measurement_Name_2' => $request->Measurement_Name_2
            ]);
            return redirect('/measurement')->with(['success' => 'Data Measurement Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Measurement $measurement)
    {
        //Measurement::destroy('id_measurement',$measurement->id_measurement);
        //return redirect('/measurement')->with(['success' => 'Data Measurement Berhasil Dihapus!']);

        $measurement = Measurement::withCount(['components','tool'])->find($measurement->id_measurement);
       if (($measurement->components_count == 0) || ($measurement->tool_count == 0)) {
        $measurement->delete();
        return redirect('/measurement')->with(['success' => 'Data Measurement Berhasil Dihapus!']);
        }
        return redirect('/measurement')->with(['error'=>'Data Measurement sedang digunakan!']);
    }
}
