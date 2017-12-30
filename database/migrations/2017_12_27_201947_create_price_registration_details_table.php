<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePriceRegistrationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_registration_details', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('price_registration_id')->unsigned();
            $table->integer('cigar_id')->unsigned();
            $table->integer('customer_type_id')->unsigned();
            $table->decimal('price');
            $table->integer('active');
            $table->timestamps();

            $table->foreign('price_registration_id')->references('id')->on('price_registrations')->onDelete('cascade');
            $table->foreign('cigar_id')->references('id')->on('cigars')->onDelete('cascade');
            $table->foreign('customer_type_id')->references('id')->on('customer_types')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('price_registration_datails');
    }
}
