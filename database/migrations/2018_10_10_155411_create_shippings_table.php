<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateShippingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shippings', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->unsigned();
            $table->string('invoiceNumbers');
            $table->string('invoicesFiles');
            $table->string('packingListFiles');
            $table->string('awbFiles');
            $table->string('sanitaryCertificateFiles');
            $table->string('freight_type_name');
            $table->integer('freight_provider_id');
            $table->string('freight_provider_name');
            $table->decimal('freight_cost', 8, 2);
            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('shippings');
    }
}
