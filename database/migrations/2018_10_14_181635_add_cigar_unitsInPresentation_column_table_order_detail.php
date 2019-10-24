<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCigarUnitsInPresentationColumnTableOrderDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('detail_orders', function($table){

            $table->integer('cigar_unitsInPresentation');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('detail_orders', function($table){

            $table->dropColumn('cigar_unitsInPresentation');

        });
    }
}
