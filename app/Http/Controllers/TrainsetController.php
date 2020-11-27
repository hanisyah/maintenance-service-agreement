<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trainset;
use App\Plant;
use App\Project;

class TrainsetController extends Controller
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
        $trainset = Trainset::all();
        $plant = Plant::all();
        $project = Project::all();

        return view('trainset.index', ['trainset' => $trainset, 'plant' => $plant, 'project' => $project]); 
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
        Trainset::create([
            'plant_id' => $request->id_plant,
            'project_id' => $request->idProject,
            'setCode' => $request->setCode,
            'setName' => $request->setName,
            'carNumber' => $request->carNumber,
            'carName' => $request->carName
        ]);
        return redirect('/train-set')->with(['success' => 'Data Train Set Berhasil Ditambahkan!']);
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
    public function edit(Trainset $train_set)
    {
        $trainset = Trainset::find($train_set->idTrainset);
        $plant = Plant::all();
        $project = Project::all();
        return view('trainset.edit', ['trainset' => $trainset, 'plant' => $plant, 'project' => $project]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trainset $train_set)
    {
        Trainset::where('idTrainset', $train_set->idTrainset)
            ->update([
                'plant_id' => $request->id_plant,
                'project_id' => $request->idProject,
                'setCode' => $request->setCode,
                'setName' => $request->setName,
                'carNumber' => $request->carNumber,
                'carName' => $request->carName
            ]);
            return redirect('/train-set')->with(['success' => 'Data Train Set Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trainset $train_set)
    {
        Trainset::destroy($train_set->idTrainset);
        return redirect('/train-set')->with(['success' => 'Data Train Set Berhasil Dihapus!']);
    }
}
