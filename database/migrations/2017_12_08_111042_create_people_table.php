<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('titles_id')->unsigned()->nullable();;
            $table->string('lastName');
            $table->string('email')->unique();
            $table->string('telephone');
            $table->timestamps();


            $table->foreign('titles_id')->references('id')->on('titles')->onDelete('set null');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('people');
    }
}
