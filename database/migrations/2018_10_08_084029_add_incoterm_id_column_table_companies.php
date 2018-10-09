<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIncotermIdColumnTableCompanies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('companies', function($table){

            $table->integer('incoterm_id')->unsigned()->nullable();
            $table->foreign('incoterm_id')->references('id')->on('incoterms')->onDelete('set null');


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

            $table->dropColumn('incoterm_id');
        });
    }
}
