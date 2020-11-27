<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Yajra\Datatables\Datatables;
use App\lokasi;
use App\plant;
use Session;

class PlantController extends Controller
{
    
    public function json(){
        return Datatables::of(Plant::all())->make(true);
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $plant = DB::table('plant')->get();
        return view('plant.index',['plant' => $plant]);
    }

  

    public function tambah(){
        return view('tambah');
    }

    public function store(Request $request){
       DB::table('plant')->insert([
        'nama_plant' => $request->nama_plant,
        'kode' => $request->kode
        ]);
       return redirect('/plant');
    }

     // method untuk edit data plant
    public function edit(Request $request)
{
    // mengambil data plant berdasarkan id yang dipilih
    $plant = DB::table('plant')->where('id_plant',$request->id_plant)->get();

    // passing data plant yang didapat ke view edit.blade.php
    return view('plant/edit',['plant' => $plant]);

}

// update data plant
    public function update(Request $request){
        DB::table('plant')->where('id_plant', $request->id_plant)->update([
        'nama_plant' => $request->nama_plant,
        'kode' => $request->kode        
        ]);

        return redirect('/plant');
    }

    public function hapus  (Request $request){
    // ($id_plant)
        $plant = $request->id_plant;
       DB::table('plant')->where('id_plant', $request->id_plant)->delete();
       return redirect('/plant')->with('message','Task is completely deleted');  

    //    $plant = Plant::withCount(['lokasi'])->find($id_plant);

    //     dd($plant);
    //    if ($plant->lokasi_count == 0) {
    //     $plant->delete();
    //     return redirect('/plant')->with(['success'=>'Plant Dihapus']);
    //     }
    //     return redirect('/plant')->with(['error'=>'Plant ini sedang digunakan!']);
    }

}