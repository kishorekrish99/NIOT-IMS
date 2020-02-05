<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRfidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rfids', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('RFID');
            $table->bigInteger('department_id')->default(null);
            $table->foreign('department_id')->references('id')->on('Departments');
            $table->bigInteger('component_id');
            $table->foreign('component_id')->references('id')->on('components');
            $table->bigInteger('unit_id');
            $table->foreign('unit_id')->references('id')->on('units');
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
        Schema::dropIfExists('rfids');
    }
}
