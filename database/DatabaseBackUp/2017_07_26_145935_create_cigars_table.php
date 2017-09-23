<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCigarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cigars', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('brand_groups_id')->unsigned();
            $table->integer('unit_of_measurements_id')->unsigned();
            $table->integer('cigar_sizes_id')->unsigned();
            $table->string('name');
            $table->double('netWeight',15,2);
            $table->boolean('active')->default(true);
            $table->timestamps();

            $table->foreign('brand_groups_id')->references('id')->on('brand_groups')->onDelete('cascade');
            $table->foreign('unit_of_measurements_id')->references('id')->on('unit_of_measurements')->onDelete('cascade');
            $table->foreign('cigar_sizes_id')->references('id')->on('cigar_sizes')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cigars');
    }
}
