<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMainComponentLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main_component_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('RFID');
            $table->datetime('check_in',0);
            $table->datetime('check_out',0);
            $table->bigInteger('main_component_fk');
            $table->foreign('main_component_fk')->references('id')->on('main_components');
            $table->enum('status',['available','unavailable','in progress']);
            $table->bigInteger('destiantion_dept_fk');
            $table->foreign('destiantion_dept_fk')->references('id')->on('departments');
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
        Schema::dropIfExists('main_logs');
    }
}
