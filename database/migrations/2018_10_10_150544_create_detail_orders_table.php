<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDetailOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_orders', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->unsigned();
            $table->integer('cigar_id')->unsigned();
            $table->string('cigar_barcode');
            $table->string('brand_name');
            $table->string('cigar_name');
            $table->string('cigar_size_name');
            $table->decimal('cigar_netWeight', 8, 2);
            $table->integer('quantity');
            $table->string('cigar_unitOfMeasurement_name');
            $table->integer('subTotalCigars');
            $table->decimal('cigar_price', 8, 2);
            $table->double('subAmount', 15, 2);
            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('cigar_id')->references('id')->on('cigars')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('detail_orders');
    }
}
