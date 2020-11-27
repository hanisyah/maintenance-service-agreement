<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Measurement;
use App\Component;

class ComponentController extends Controller
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
        $component = Component::all();
        $measurement = Measurement::all();

        return view('component.index', ['component' => $component, 'measurement' => $measurement]); 
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
        Component::create([
            'type' => $request->type,
            'code' => $request->code,
            'name' => $request->name,
            'measurement_id' => $request->id_measurement,
            'minStock' => $request->minStock,
            'normalDuration' => $request->normalDuration,
            'leadTime' => $request->leadTime,
            'specification' => $request->specification
        ]);
        return redirect('/component-consumable')->with(['success' => 'Data Component& Consumable Berhasil Ditambahkan!']);
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
    public function edit(Component $component_consumable)
    {
        $component_consumable = Component::find($component_consumable->idComponent);
        $measurement = Measurement::all();
        return view('component/edit', ['component_consumable' => $component_consumable, 'measurement' => $measurement]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Component $component_consumable)
    {
        Component::where('idComponent', $component_consumable->idComponent)
            ->update([
                'type' => $request->type,
                'code' => $request->code,
                'name' => $request->name,
                'measurement_id' => $request->id_measurement,
                'minStock' => $request->minStock,
                'normalDuration' => $request->normalDuration,
                'leadTime' => $request->leadTime,
                'specification' => $request->specification
            ]);
            return redirect('/component-consumable')->with(['success' => 'Data Component & Consumable Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Component $component_consumable)
    {
        Component::destroy($component_consumable->idComponent);
        return redirect('/component-consumable')->with(['success' => 'Data Component & Consumable Berhasil Dihapus!']);
    }
}
