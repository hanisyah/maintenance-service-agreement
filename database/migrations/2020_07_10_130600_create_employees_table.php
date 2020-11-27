<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('idEmployee');
            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')->references('idCompany')->on('companies')->onUpdate('cascade');
            $table->integer('emID');
            $table->string('emName');
            $table->string('emPosition')->nullable();
            $table->string('emPhone')->nullable();
            $table->string('emNote')->nullable();
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
        Schema::dropIfExists('employees');
    }
}
