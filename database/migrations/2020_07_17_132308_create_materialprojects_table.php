<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialprojectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materialprojects', function (Blueprint $table) {
            $table->increments('idMaterialProject');
            $table->integer('plant_id')->unsigned();
            $table->foreign('plant_id')->references('id_plant')->on('plant')->onUpdate('cascade');
            $table->integer('project_id')->unsigned();
            $table->foreign('project_id')->references('idProject')->on('projects')->onUpdate('cascade');
            $table->integer('measurement_id')->unsigned();
            $table->foreign('measurement_id')->references('id_measurement')->on('measurement')->onUpdate('cascade');
            $table->integer('component_id')->unsigned();
            $table->foreign('component_id')->references('idComponent')->on('components')->onUpdate('cascade');
            $table->integer('pic_id')->unsigned();
            $table->foreign('pic_id')->references('idPic')->on('pics')->onUpdate('cascade');
            $table->string('level');
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
        Schema::dropIfExists('materialprojects');
    }
}
