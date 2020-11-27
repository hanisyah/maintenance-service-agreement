<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailstocktoolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailstocktool', function (Blueprint $table) {
            $table->increments('id_detailstocktool');
            $table->integer('tool_id')->unsigned();
            $table->integer('measurement_id')->unsigned();
            $table->integer('plant_id')->unsigned();
            $table->integer('lokasi_id')->unsigned();
            $table->foreign('tool_id')->references('id_tool')->on('tool')->onUpdate('cascade');
            $table->foreign('measurement_id')->references('id_measurement')->on('measurement')->onUpdate('cascade');
            $table->foreign('plant_id')->references('id_plant')->on('plant')->onUpdate('cascade');
            $table->foreign('lokasi_id')->references('id_lokasi')->on('lokasi')->onUpdate('cascade');
            $table->text('source');
            $table->text('doc_number');
            $table->text('uni_number');
            $table->text('stock_date');
            $table->text('stock_status');
            $table->text('stock_used');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detailstocktool');
    }
}

