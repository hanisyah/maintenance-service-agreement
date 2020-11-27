<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pic;
use App\Plant;
use App\Project;
use App\Employee;

class PicController extends Controller
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
        $pic = Pic::all();
        $plant = Plant::all();
        $project = Project::all();
        $employee = Employee::all();

        return view('pic.index', ['pic' => $pic, 'plant' => $plant, 'project' => $project, 'employee' => $employee]); 
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
        Pic::create([
            'plant_id' => $request->id_plant,
            'project_id' => $request->idProject,
            'employee_id' => $request->idEmployee,
            'status' => $request->status
        ]);
        return redirect('/pic')->with(['success' => 'Data PIC Project Berhasil Ditambahkan!']);
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
    public function edit(Pic $pic)
    {
        $pic = Pic::find($pic->idPic);
        $plant = Plant::all();
        $project = Project::all();
        $employee = Employee::all();
        return view('pic.edit', ['pic' => $pic, 'plant' => $plant, 'project' => $project, 'employee' => $employee]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pic $pic)
    {
        Pic::where('idPic', $pic->idPic)
            ->update([
                'plant_id' => $request->id_plant,
                'project_id' => $request->idProject,
                'employee_id' => $request->idEmployee,
                'status' => $request->status
            ]);
        return redirect('/pic')->with(['success' => 'Data PIC Project Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pic $pic)
    {
        Pic::destroy($pic->idPic);
        return redirect('/pic')->with(['success' => 'Data PIC Project Berhasil Dihapus!']);
    }
}
