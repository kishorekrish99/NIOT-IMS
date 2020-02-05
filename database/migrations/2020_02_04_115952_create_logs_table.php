<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('rfid_id');
            $table->foreign('rfid_id')->references('id')->on('rfids');
            $table->dateTime('check_in')->nullable();
            $table->dateTime('check_out')->nullable();
            $table->bigInteger('department_id');
            $table->foreign('department_id')->references('id')->on('departments');
            $table->bigInteger('scanner_id');
            $table->foreign('scanner_id')->references('id')->on('scanners');
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
        Schema::dropIfExists('logs');
    }
}
