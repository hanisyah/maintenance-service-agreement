<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tool;
use App\Measurement;

class ToolController extends Controller
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
        $tool = tool::all();
        $measurement = measurement::all();

        return view('tool.index', ['tool' => $tool, 'measurement' => $measurement]); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        tool::create([
            'measurement_id' => $request->id_measurement,
            'tool_code' => $request->tool_code,
            'tool_name' => $request->tool_name,
            'duration' => $request->duration,
            'tool_specification' => $request->tool_specification,
            'calibrate' => $request->calibrate
        ]);
        return redirect('/tool')->with(['success' => 'Data Tool Berhasil Ditambahkan!']);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tool $tool)
    {
        //$tool = DB::table('tools')->where('id_tool', $tool->id_tool)->get();
        $tool = tool::find($tool->id_tool);
        $measurement = measurement::all();
        return view('tool/edit', ['tool' => $tool, 'measurement' => $measurement]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tool $tool)
    {
        Tool::where('id_tool', $tool->id_tool)
            ->update([
                'tool_code' => $request->tool_code,
                'tool_name' => $request->tool_name,
                'measurement_id' => $request->id_measurement,
                'duration' => $request->duration,
                'tool_specification' => $request->tool_specification,
                'calibrate' => $request->calibrate
            ]);
            return redirect('/tool')->with(['success' => 'Data Tool Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tool $tool)
    {
        //Tool::destroy($tool->id_tool);
        //return redirect('/tool')->with(['success' => 'Data Tool Berhasil Dihapus!']);

        $tool = Tool::withCount(['tasks'])->find($tool->id_tool);
        if ($tool->tasks_count == 0) {
        $tool->delete();
        return redirect('/tool')->with(['success'=>'Data Tool Berhasil Dihapus!']);
        }
        return redirect('/tool')->with(['error'=>'Data Tool sedang digunakan!']);
    }
}


