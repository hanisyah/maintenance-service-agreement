<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaintenancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenances', function (Blueprint $table) {
            $table->increments('id_maintenance');
            $table->integer('task_id')->unsigned();
            $table->foreign('task_id')->references('idTask')->on('tasks')->onUpdate('cascade');
            $table->string('codeMain');
            $table->string('nameMain');
            $table->string('noteMain')->nullable();
            $table->integer('dayMain');
            $table->integer('prioMain');
            $table->text('colorMain');
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
        Schema::dropIfExists('maintenances');
    }
}
