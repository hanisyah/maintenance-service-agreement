<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Tool;

class TaskController extends Controller
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
        $task = Task::all();
        $tool = Tool::all();

        return view('task.index', ['task' => $task, 'tool' => $tool]); 
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Task::create([
            'tool_id' => $request->id_tool,
            'taskName' => $request->taskName,
            'taskNote' => $request->taskNote
        ]);
        return redirect('/task')->with(['success' => 'Data Task Berhasil Ditambahkan!']);
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $task = Task::find($task->idTask);
        $tool = Tool::all();
        return view('task/edit', ['task' => $task, 'tool' => $tool]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        Task::where('idTask', $task->idTask)
            ->update([
                'tool_id' => $request->id_tool,
                'taskName' => $request->taskName,
                'taskNote' => $request->taskNote
            ]);
            return redirect('/task')->with(['success' => 'Data Task Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        Task::destroy($task->idTask);
        return redirect('/task')->with(['success' => 'Data Task Berhasil Dihapus!']);
    }
}
