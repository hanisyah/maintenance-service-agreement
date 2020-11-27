<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatalogtoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalogtools', function (Blueprint $table) {
            $table->increments('idCatalogtool');
            $table->integer('plant_id')->unsigned();
            $table->foreign('plant_id')->references('id_plant')->on('plant')->onUpdate('cascade');
            $table->integer('location_id')->unsigned();
            $table->foreign('location_id')->references('id_lokasi')->on('lokasi')->onUpdate('cascade');
            $table->integer('pic_id')->unsigned();
            $table->foreign('pic_id')->references('idPic')->on('pics')->onUpdate('cascade');
            $table->integer('measurement_id')->unsigned();
            $table->foreign('measurement_id')->references('id_measurement')->on('measurement')->onUpdate('cascade');
            $table->integer('tool_id')->unsigned();
            $table->foreign('tool_id')->references('id_tool')->on('tool')->onUpdate('cascade');
            $table->integer('stocktool_id')->unsigned();
            $table->foreign('stocktool_id')->references('id_stocktool')->on('stocktool')->onUpdate('cascade');
            $table->integer('availableStock');
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
        Schema::dropIfExists('catalogtools');
    }
}
