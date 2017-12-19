<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBoncheroesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boncheroes', function(Blueprint $table) {
            $table->increments('id');
            $table->string('Name');
            $table->string('lastName');
            $table->string('email');
            $table->string('phone_Number');
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
        Schema::drop('boncheroes');
    }
}
