<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bads', function (Blueprint $table) {
            $table->increments('idBad');
            $table->integer('plant_id')->unsigned();
            $table->integer('lokasi_id')->unsigned();
            $table->integer('pic_id')->unsigned();
            $table->integer('project_id')->unsigned();
            $table->integer('trainset_id')->unsigned();
            $table->integer('measurement_id')->unsigned();
            $table->integer('component_id')->unsigned();
            $table->integer('stockmaterial_id')->unsigned();
            $table->integer('carmaterial_id')->unsigned();
            $table->foreign('plant_id')->references('id_plant')->on('plant')->onUpdate('cascade');
            $table->foreign('lokasi_id')->references('id_lokasi')->on('lokasi')->onUpdate('cascade');
            $table->foreign('pic_id')->references('idPic')->on('pics')->onUpdate('cascade');
            $table->foreign('project_id')->references('idProject')->on('projects')->onUpdate('cascade');
            $table->foreign('trainset_id')->references('idTrainset')->on('trainsets')->onUpdate('cascade');
            $table->foreign('measurement_id')->references('id_measurement')->on('measurement')->onUpdate('cascade');
            $table->foreign('component_id')->references('idComponent')->on('components')->onUpdate('cascade');
            $table->foreign('stockmaterial_id')->references('id_stockmaterial')->on('stockmaterial')->onUpdate('cascade');
            $table->foreign('carmaterial_id')->references('id_carMaterial')->on('carmaterial')->onUpdate('cascade');
            $table->text('detail');
            $table->text('bad');
            $table->text('status');
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
        Schema::dropIfExists('bads');
    }
}
