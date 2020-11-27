<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\lokasi;
use App\plant;
use App\measurement;
use App\tool;
use App\stockmaterial;
use App\Component;


class StockMaterialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $stockmaterial = stockmaterial::all();
        $lokasi = lokasi::all();
        $plant = Plant::all();
        $tool = tool::all();
        $measurement = measurement::all();
        $component = Component::all();
        return view('stockmaterial.index',['stockmaterial'=>$stockmaterial , 'lokasi' => $lokasi, 'component' => $component, 'plant' => $plant,  'tool' => $tool ,  'measurement' => $measurement]);
    }

    // public function detail(Stocktool $stocktool)
    // {
    //     $stocktool = stocktool::find($stocktool->id_stocktool);
    //     $lokasi = lokasi::all();
    //     $plant = Plant::all();
    //     $tool = tool::all();
    //     $measurement = measurement::all();
    //     return view('stocktool.detail', ['stocktool'=> $stocktool , 'lokasi' => $lokasi, 'plant' => $plant,  'tool' => $tool ,  'measurement' => $measurement]); 
    // }
}
