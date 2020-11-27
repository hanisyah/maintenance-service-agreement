<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Cause_class;
use Illuminate\Support\Facades\DB;


class CauseClassController extends Controller
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
        $cause_class = cause_class::all();
        return view('cause_class.index', ['cause_class' => $cause_class]); 
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
        cause_class::create($request->all());
        return redirect('/cause_class')->with(['success' => 'Data Cause Class Berhasil Ditambahkan!']);
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
    public function edit(cause_class $cause_class)
    {
        return view('cause_class/edit', ['cause_class' => $cause_class]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cause_class $cause_class)
    {
        cause_class::where('id_cause_class', $cause_class->id_cause_class)
            ->update([
               'Cause_Class_Name' => $request->Cause_Class_Name
            ]);
            return redirect('/cause_class')->with(['success' => 'Data Cause Class Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(cause_class $cause_class)
    {
        cause_class::destroy($cause_class->id_cause_class);
        return redirect('/cause_class')->with(['success' => 'Data cause_class Berhasil Dihapus!']);
    }
}
