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
            $table->integer('brand_groups_id')->unsigned()->nullable();
            $table->integer('unit_of_measurements_id')->unsigned()->nullable();
            $table->integer('cigar_sizes_id')->unsigned()->nullable();
            $table->integer('category_products_id')->unsigned()->nullable();
            $table->bigInteger('barcode')->unsigned();
            $table->string('name');
            $table->double('netWeight',15,2);
            $table->integer('unitsInPresentation');
            $table->string('image');
            $table->boolean('active')->default(true);
            $table->timestamps();

            // $table->foreign('brand_groups_id')->references('id')->on('brand_groups')->onDelete('set null');
            // $table->foreign('unit_of_measurements_id')->references('id')->on('unit_of_measurements')->onDelete('set null');
            // $table->foreign('cigar_sizes_id')->references('id')->on('cigar_sizes')->onDelete('set null');
            // $table->foreign('category_products_id')->references('id')->on('category_products')->onDelete('set null');


            $table->unique(['brand_groups_id', 'unit_of_measurements_id', 'cigar_sizes_id', 'category_products_id', 'barcode', 'unitsInPresentation'], 'unique_cigar');


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
