<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Problem_class;
use Illuminate\Support\Facades\DB;


class ProblemClassController extends Controller
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
        $problem_class = problem_class::all();
        return view('problem_class.index', ['problem_class' => $problem_class]); 
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
        problem_class::create($request->all());
        return redirect('/problem_class')->with(['success' => 'Data problem_class Berhasil Ditambahkan!']);
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
    public function edit(problem_class $problem_class)
    {
        return view('problem_class/edit', ['problem_class' => $problem_class]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, problem_class $problem_class)
    {
        problem_class::where('id_problem_class', $problem_class->id_problem_class)
            ->update([
               'Problem_Class_Name' => $request->Problem_Class_Name
            ]);
            return redirect('/problem_class')->with(['success' => 'Data problem_class Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(problem_class $problem_class)
    {
        problem_class::destroy($problem_class->id_problem_class);
        return redirect('/problem_class')->with(['success' => 'Data problem_class Berhasil Dihapus!']);
    }
}
