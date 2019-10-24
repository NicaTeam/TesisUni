<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('orders', function($table){

            $table->decimal('shipping_quote', 8, 2)->nullable();
            $table->decimal('final_freight_cost', 8, 2)->default(0.00);
            $table->double('grand_total', 15, 2);
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function($table){

            $table->dropColumn('shipping_quote');
            $table->dropColumn('final_freight_cost');
            $table->dropColumn('grand_total');
        });
    }
}
