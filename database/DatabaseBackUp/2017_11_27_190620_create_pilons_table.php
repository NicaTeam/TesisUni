<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePilonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pilons', function(Blueprint $table) {
            $table->increments('id');
            $table->string('NameTabacco');
            $table->string('MorningTemperture');
            $table->string('AfternoonTemperture');
            $table->string('PilonNumber');
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
        Schema::drop('pilons');
    }
}
