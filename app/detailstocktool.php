<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detailstocktool extends Model
{
    protected $primaryKey = 'id_detailstocktool';
    protected $table = 'detail_stocktool';
    protected $fillable = ['stocktool_id','tool_id','plant_id','lokasi_id','measurement_id','source','plant_location','document_number','unique_number','stock_date','stock_status','stock_used'];

    public function plant(){
    	return $this->belongsTo('App\plant','plant_id');
    }

    public function stocktool(){
    	return $this->belongsTo('App\stocktool','stocktool_id');
    }

    public function measurement(){
    	return $this->belongsTo('App\measurement','measurement_id');
    }

    public function tool(){
    	return $this->belongsTo('App\tool','tool_id');
    }

    public function lokasi(){
    	return $this->belongsTo('App\lokasi','lokasi_id');
    }
}

				