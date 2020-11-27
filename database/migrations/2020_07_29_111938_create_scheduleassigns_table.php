<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScheduleassignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scheduleassigns', function (Blueprint $table) {
            $table->increments('idScheduleassign');
            $table->integer('plant_id')->unsigned();
            $table->integer('lokasi_id')->unsigned();
            $table->integer('pic_id')->unsigned();
            $table->integer('project_id')->unsigned();
            $table->integer('trainset_id')->unsigned();
            $table->integer('maintenance_id')->unsigned();
            $table->foreign('plant_id')->references('id_plant')->on('plant')->onUpdate('cascade');
            $table->foreign('lokasi_id')->references('id_lokasi')->on('lokasi')->onUpdate('cascade');
            $table->foreign('pic_id')->references('idPic')->on('pics')->onUpdate('cascade');
            $table->foreign('project_id')->references('idProject')->on('projects')->onUpdate('cascade');
            $table->foreign('trainset_id')->references('idTrainset')->on('trainsets')->onUpdate('cascade');
            $table->foreign('maintenance_id')->references('id_maintenance')->on('maintenances')->onUpdate('cascade');
            $table->date('approxStart');
            $table->date('approxEnd');
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
        Schema::dropIfExists('scheduleassigns');
    }
}
