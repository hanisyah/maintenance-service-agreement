<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocemployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locemployees', function (Blueprint $table) {
            $table->increments('idLocemployee');
            $table->integer('plant_id')->unsigned();
            $table->integer('location_id')->unsigned();
            $table->integer('employee_id')->unsigned();

            $table->foreign('plant_id')->references('id_plant')->on('plant')->onUpdate('cascade');
            $table->foreign('location_id')->references('id_lokasi')->on('lokasi')->onUpdate('cascade');
            $table->foreign('employee_id')->references('idEmployee')->on('employees')->onUpdate('cascade');
            $table->text('responsible');
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
        Schema::dropIfExists('locemployees');
    }
}
