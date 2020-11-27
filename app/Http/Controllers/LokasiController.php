<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\lokasi;
use App\Plant;

class LokasiController extends Controller
{
    
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
        $lokasi = lokasi::all();
        $plant = Plant::all();
        return view('lokasi.index',['lokasi' => $lokasi, 'plant' => $plant]);
    }

   
    public function cari(Request $request)
	{
		// menangkap data pencarian
        $cari = $request->cari;
        
 
    		// mengambil data dari table pegawai sesuai pencarian data
        $lokasi = DB::table('lokasi')
		->where('nama_lokasi','like',"%".$cari."%")
        ->paginate();
        
    		// mengirim data pegawai ke view index
		return view('lokasi.index',['lokasi' => $lokasi, 'plant'=> $plant]);
 
	}

    public function tambah(){
        return view('tambah');
    }

    public function store(Request $request){
      
       DB::table('lokasi')->insert([

        'plant_id' => $request->id_plant,
        'nama_lokasi' => $request->nama_lokasi
        ]);
       return redirect('/lokasi')->with(['success' => 'Data Location Berhasil Ditambahkan!']);
    }


    // method untuk edit data lokasi
    public function edit(Request $request)
{
    // mengambil data lokasi berdasarkan id yang dipilih
    $lokasi = DB::table('lokasi')->where('id_lokasi',$request->id_lokasi)->get();
    $plant = Plant::all();

    // passing data lokasi yang didapat ke view edit.blade.php
    return view('lokasi/edit',['lokasi' => $lokasi,  'plant' => $plant]);

}

// update data lokasi
    public function update(Request $request){
        DB::table('lokasi')->where('id_lokasi', $request->id_lokasi)->update([
        'plant_id' => $request->id_plant,
        'nama_lokasi' => $request->nama_lokasi]);

        return redirect('/lokasi');
    }

    public function hapus(Request $request)
    {
       $lokasi = $request->id_lokasi1;
       DB::table('lokasi')->where('id_lokasi', $request->id_lokasi1)->delete();
       return redirect('/lokasi')->with('message','Task is completely deleted');  


    }

}
