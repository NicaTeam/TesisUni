<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id');
            $table->string('wire_transfer_number');
            $table->string('bank_name');
            $table->double('amount_due', 15, 2);
            $table->double('net_amount_paid', 15, 2);
            $table->decimal('external_bank_commission', 8, 2);
            $table->decimal('internal_bank_commission', 8, 2);
            $table->double('new_amount_due', 15, 2);
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
        Schema::drop('payments');
    }
}
