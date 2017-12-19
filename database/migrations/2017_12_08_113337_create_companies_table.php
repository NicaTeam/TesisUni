<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->integer('countries_id')->unsigned()->nullable();
            $table->integer('company_types_id')->unsigned()->nullable();
            $table->string('shippingAddress');
            $table->string('telephone');
            $table->timestamps();

            $table->foreign('countries_id')->references('id')->on('countries')->onDelete('set null');
            $table->foreign('company_types_id')->references('id')->on('company_types')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('companies');
    }
}
