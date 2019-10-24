<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('company_id')->unsigned();
            $table->string('reference')->unique()->index();
            $table->string('company_name');
            $table->string('company_shipping_addres');
            $table->string('company_contact_name');
            $table->string('company_contact_email');
            $table->string('company_contact_telephone');
            $table->string('payment_term_name');
            $table->string('incoterm_name');
            $table->string('customs_agency_name');
            $table->string('customs_agency_shipping_address');
            $table->string('customs_agency_contact_name');
            $table->string('customs_agency_contact_email');
            $table->string('customs_agency_contact_telephone');
            $table->decimal('total_net_weight_in_grams', 8, 2);
            $table->integer('total_boxes');
            $table->integer('total_packs');
            $table->integer('total_cigars');
            $table->double('amount_order_total', 15, 2);
            $table->double('amount_due', 15, 2);
            $table->string('raw_order_file')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orders');
    }
}
