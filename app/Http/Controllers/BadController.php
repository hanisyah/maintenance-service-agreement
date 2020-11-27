<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bad;
use App\plant;
use App\lokasi;
use App\Pic;
use App\Project;
use App\Trainset;
use App\measurement;
use App\Component;
use App\stockmaterial;
use App\carmaterial;

class BadController extends Controller
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
        $bad = Bad::all();
        $plant = plant::all();
        $lokasi = lokasi::all();
        $pic = Pic::all();
        $project = Project::all();
        $trainset = Trainset::all();
        $measurement = measurement::all();
        $component = Component::all();
        $stockmaterial = stockmaterial::all();
        $carmaterial = carmaterial::all();
        return view('bad.index', compact('bad','plant','lokasi','pic','project','trainset','measurement','component','stockmaterial','carmaterial'));
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
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
