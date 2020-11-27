<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\lokasi;
use App\plant;
use App\measurement;
use App\tool;
use App\stocktool; 
use PDF;


class StockToolController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $stocktool = stocktool::all();
        $lokasi = lokasi::all();
        $plant = Plant::all();
        $tool = tool::all();
        $measurement = measurement::all();
        return view('stocktool.index',['stocktool'=>$stocktool , 'lokasi' => $lokasi, 'plant' => $plant,  'tool' => $tool ,  'measurement' => $measurement]);
    }

    public function detail(Stocktool $stocktool)
    {
        $stocktool = stocktool::all();
        $lokasi = lokasi::all();
        $plant = Plant::all();
        $tool = tool::all();
        $measurement = measurement::all();
        return view('stocktool/detail', ['stocktool'=>$stocktool , 'lokasi' => $lokasi, 'plant' => $plant,  'tool' => $tool ,  'measurement' => $measurement]); 
    }



    public function cetak_pdf(Stocktool $stocktool)
    {
        $stocktool = stocktool::all();
        $lokasi = lokasi::all();
        $plant = Plant::all();
        $tool = tool::all();
        $measurement = measurement::all();
 
    	$pdf = PDF::loadview('stocktool/stocktool_pdf',['stocktool'=>$stocktool , 'lokasi' => $lokasi, 'plant' => $plant,  'tool' => $tool ,  'measurement' => $measurement]);
    	return $pdf->download('laporan-stocktool-pdf');
}
}
