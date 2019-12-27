<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubComponentLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_component_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('main_log_fk');
            $table->foreign('main_log_fk')->references('id')->on('main_component_logs');
            $table->string('RFID');
            $table->bigInteger('child_component_fk');
            $table->foreign('child_component_fk')->references('id')->on('child_components');
            $table->enum('status',['available','unavailable','in progress']);
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
        Schema::dropIfExists('sub_component_logs');
    }
}
