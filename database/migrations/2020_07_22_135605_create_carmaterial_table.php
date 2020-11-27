<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarmaterialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carmaterial', function (Blueprint $table) {
            $table->increments('id_carMaterial');
            $table->integer('tool_id')->unsigned();
            $table->integer('measurement_id')->unsigned();
            $table->integer('plant_id')->unsigned();
            $table->integer('lokasi_id')->unsigned();
            $table->integer('project_id')->unsigned();
            $table->integer('trainset_id')->unsigned();
            $table->foreign('tool_id')->references('id_tool')->on('tool')->onUpdate('cascade');
            $table->foreign('measurement_id')->references('id_measurement')->on('measurement')->onUpdate('cascade');
            $table->foreign('plant_id')->references('id_plant')->on('plant')->onUpdate('cascade');
            $table->foreign('project_id')->references('idProject')->on('projects')->onUpdate('cascade');
            $table->foreign('lokasi_id')->references('id_lokasi')->on('lokasi')->onUpdate('cascade');
            $table->foreign('trainset_id')->references('idTrainset')->on('trainsets')->onUpdate('cascade');
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
        Schema::dropIfExists('carmaterial');
    }
}
