<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->integer('country_id')->unsigned()->nullable();
            $table->string('shippingAddress');
            $table->string('telephone');
            $table->string('email')->unique();
            $table->string('contact_name');
            $table->integer('company_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('country_id')->references('id')->on('countries')->onDelete('set null');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('agents');
    }
}
