<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pics', function (Blueprint $table) {
            $table->increments('idPic');
            $table->integer('plant_id')->unsigned();
            $table->foreign('plant_id')->references('id_plant')->on('plant')->onUpdate('cascade');
            $table->integer('project_id')->unsigned();
            $table->foreign('project_id')->references('idProject')->on('projects')->onUpdate('cascade');
            $table->integer('employee_id')->unsigned();
            $table->foreign('employee_id')->references('idEmployee')->on('employees')->onUpdate('cascade');
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
        Schema::dropIfExists('pics');
    }
}
