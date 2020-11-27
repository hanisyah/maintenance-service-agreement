<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransfertoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfertools', function (Blueprint $table) {
            $table->increments('idTransfertool');
            $table->integer('plant_id')->unsigned();
            $table->integer('lokasi_id')->unsigned();
            $table->integer('pic_id')->unsigned();
            $table->integer('measurement_id')->unsigned();
            $table->integer('tool_id')->unsigned();
            $table->foreign('plant_id')->references('id_plant')->on('plant')->onUpdate('cascade');
            $table->foreign('lokasi_id')->references('id_lokasi')->on('lokasi')->onUpdate('cascade');
            $table->foreign('pic_id')->references('idPic')->on('pics')->onUpdate('cascade');
            $table->foreign('measurement_id')->references('id_measurement')->on('measurement')->onUpdate('cascade');
            $table->foreign('tool_id')->references('id_tool')->on('tool')->onUpdate('cascade');
            $table->string('noBPM');
            $table->date('dateRequest');
            $table->string('noteBPM');
            $table->string('fileBPM');
            $table->date('dateBPM');
            $table->integer('qty');
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
        Schema::dropIfExists('transfertools');
    }
}
