<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChildComponentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('child_components', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('main_component_fk');
            $table->foreign('main_component_fk')->references('id')->on('main_components');
            $table->string('name');
            $table->Integer('parent_table');
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
        Schema::dropIfExists('child_components');
    }
}
