<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plant;
use App\Project;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getData($idProject)
    {
    $data = Project::where("plant_id",$idProject)->get();
    return view('project.index', ['project' => $project, 'plant' => $plant]); 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $project = Project::all();
        $plant = Plant::all();

        return view('project.index', ['project' => $project, 'plant' => $plant]); 
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
    public function edit(Project $project)
    {
        $project = Project::find($project->idProject);
        $plant = Plant::all();
        return view('project/edit', ['project' => $project, 'plant' => $plant]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        Project::where('idProject', $project->idProject)
            ->update([
                'plant_id' => $request->id_plant,
                'proCode' => $request->proCode,
                'proName' => $request->proName,
                'startDate' => $request->startDate,
                'endDate' => $request->endDate,
                'status' => $request->status
            ]);
            return redirect('/project')->with(['success' => 'Data Project Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        Project::destroy($project->idProject);
        return redirect('/project')->with(['success' => 'Data Project Berhasil Dihapus!']);
    }
}
