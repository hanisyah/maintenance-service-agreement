<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MaintenanceTask extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenance_task', function (Blueprint $table) {
            $table->id();
            $table->integer('task_id')->unsigned();
            $table->foreign('task_id')->references('idTask')->on('tasks')->onUpdate('cascade');
            $table->integer('maintenance_id')->unsigned();
            $table->foreign('maintenance_id')->references('id_maintenance')->on('maintenances')->onUpdate('cascade');
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
        //
    }
}
