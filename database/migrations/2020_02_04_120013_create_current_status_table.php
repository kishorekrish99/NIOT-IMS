<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrentStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('current_status', function (Blueprint $table) {
            $table->bigInteger('rfid_id');
            $table->foreign('rfid_id')->references('id')->on('rfids');
            $table->bigInteger('log_id');
            $table->foreign('log_id')->references('id')->on('logs');
            $table->bigInteger('status_id') ;
            $table->foreign('status_id')->references('id')->on('statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('current_status');
    }
}
