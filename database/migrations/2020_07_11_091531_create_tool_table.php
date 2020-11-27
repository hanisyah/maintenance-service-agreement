<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tool', function (Blueprint $table) {
            $table->increments('id_tool');
            $table->integer('measurement_id')->unsigned();
            $table->foreign('measurement_id')->references('id_measurement')->on('measurement')->onUpdate('cascade');
            $table->string('tool_code');
            $table->string('tool_name');
            $table->integer('duration');
            $table->string('tool_specification')->nullable();
            $table->text('calibrate');
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
        Schema::dropIfExists('tool');
    }
}
