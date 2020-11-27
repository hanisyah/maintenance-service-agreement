<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Locemployee;
use App\Plant;
use App\Lokasi;
use App\Employee;

class LocemployeeController extends Controller
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
        $locemployee = Locemployee::all();
        $plant = Plant::all();
        $lokasi = Lokasi::all();
        $employee = Employee::all();

        return view('locemployee.index', ['locemployee' => $locemployee, 'plant' => $plant, 'lokasi' => $lokasi, 'employee' => $employee]); 
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
        Locemployee::create([
            'plant_id' => $request->id_plant,
            'location_id' => $request->id_lokasi,
            'employee_id' => $request->idEmployee,
            'responsible' => $request->responsible,
            'status' => $request->status
        ]);
        return redirect('/locemployee')->with(['success' => 'Data Employee Berhasil Ditambahkan!']);
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
    public function edit(Locemployee $locemployee)
    {
        $locemployee = Locemployee::find($locemployee->idLocemployee);
        $plant = Plant::all();
        $lokasi = Lokasi::all();
        $employee = Employee::all();
        return view('locemployee.edit', ['locemployee' => $locemployee, 'plant' => $plant, 'lokasi' => $lokasi, 'employee' => $employee]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Locemployee $locemployee)
    {
        Locemployee::where('idLocemployee', $locemployee->idLocemployee)
            ->update([
                'plant_id' => $request->id_plant,
                'location_id' => $request->id_lokasi,
                'employee_id' => $request->idEmployee,
                'responsible' => $request->responsible,
                'status' => $request->status
            ]);
        return redirect('/locemployee')->with(['success' => 'Data Employee Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Locemployee $locemployee)
    {
        Locemployee::destroy($locemployee->idLocemployee);
        return redirect('/locemployee')->with(['success' => 'Data Employee Berhasil Dihapus!']);
    }
}
