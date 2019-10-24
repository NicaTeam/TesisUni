<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnCustomerTypeIdCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies', function($table){

            $table->integer('customer_type_id')->unsigned()->nullable();

            $table->foreign('customer_type_id')->references('id')->on('customer_types')->onDelete('set null');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('companies', function($table){

            $table->dropColumn('customer_type_id');


        });
    }
}
