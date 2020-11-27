<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatalogmaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalogmaterials', function (Blueprint $table) {
            $table->increments('idCatalogmaterial');
            $table->integer('plant_id')->unsigned();
            $table->foreign('plant_id')->references('id_plant')->on('plant')->onUpdate('cascade');
            $table->integer('location_id')->unsigned();
            $table->foreign('location_id')->references('id_lokasi')->on('lokasi')->onUpdate('cascade');
            $table->integer('project_id')->unsigned();
            $table->foreign('project_id')->references('idProject')->on('projects')->onUpdate('cascade');
            $table->integer('pic_id')->unsigned();
            $table->foreign('pic_id')->references('idPic')->on('pics')->onUpdate('cascade');
            $table->integer('component_id')->unsigned();
            $table->foreign('component_id')->references('idComponent')->on('components')->onUpdate('cascade');
            $table->integer('stockmaterial_id')->unsigned();
            $table->foreign('stockmaterial_id')->references('id_stockmaterial')->on('stockmaterial')->onUpdate('cascade');
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
        Schema::dropIfExists('catalogmaterials');
    }
}
