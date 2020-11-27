<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\lokasi;
use App\plant;
use App\measurement;
use App\tool;
use App\stocktool; 
use App\detailstocktool;

class DetailStockToolController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    } 
    
    public function index()
    {
        $detailstocktool = detailstocktool::all();
        $stocktool = stocktool::all();
        $lokasi = lokasi::all();
        $plant = Plant::all();
        $tool = tool::all();
        $measurement = measurement::all();
        return view('stocktool.detail',['detailstocktool'=>$detailstocktool , 'stocktool'=>$stocktool , 'lokasi' => $lokasi, 'plant' => $plant,  'tool' => $tool ,  'measurement' => $measurement]);
    }
}
