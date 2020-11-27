<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Task;
use App\Maintenance;
use App\Maintenance_task;

class MaintenanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $task = Task::all();
        $maintenance = Maintenance::all();
        return view('maintenance.index', ['maintenance' => $maintenance, 'task'=> $task]); 
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // $maintenance = Maintenance_task::create($request->all());
        // $maintenance->task()->attach($request->input('task_id'));
        $data = $request->all();
        

        // dd($data);

        // foreach ($request->task_id as $a) {
        //     echo $a;
        //     select task
        //     task->id
        //     insert maint_task
        // }
        // dd('stopped');

        $maintenance = new Maintenance;
        $maintenance->codeMain = $data['codeMain'];
        $maintenance->nameMain = $data['nameMain'];
        $maintenance->noteMain = $data['noteMain'];
        $maintenance->dayMain = $data['dayMain'];
        $maintenance->prioMain = $data['prioMain'];
        $maintenance->colorMain = $data['colorMain'];
        $maintenance->task_id = $data['idTask'];
        $maintenance->save();
        return redirect('/maintenance')->with(['success' => 'Data Maintenance Berhasil Ditambahkan!']);
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Maintenance $maintenance)
    {
        $maintenance = Maintenance::find($maintenance->id_maintenance);
        $task = Task::all();
        return view('maintenance/edit', ['maintenance' => $maintenance, 'task' => $task]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Maintenance $maintenance)
    {
        Maintenance::where('id_maintenance', $maintenance->id_maintenance)
            ->update([
                'codeMain' => $request->codeMain,
                'nameMain' => $request->nameMain,
                'noteMain' => $request->noteMain,
                'dayMain' => $request->dayMain,
                'prioMain' => $request->prioMain,
                'colorMain' => $request->colorMain,
                'task_id' =>$request->idTask
            ]);
            return redirect('/maintenance')->with(['success' => 'Data Maintenance Berhasil Diubah!']);
    }

    public function destroy(Maintenance $maintenance)
    {
        Maintenance::destroy($maintenance->id_maintenance);
        return redirect('/maintenance')->with(['success' => 'Data Maintenance Berhasil Dihapus!']);
    }

}
