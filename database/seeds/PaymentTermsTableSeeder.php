<?php

use Illuminate\Database\Seeder;
use SalesProgram\PaymentTerm;

class PaymentTermsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

         PaymentTerm::create([

        	'name' => 'Antes de envio',
        	'description' => 'El cliente debe pagar la orden antes de envio.',
        	'numberDays' => '0',
        	

        ]);

        PaymentTerm::create([

        	'name' => 'Net30',
        	'description' => 'El cliente debe pagar la orden 30 dias despues del envio.',
        	'numberDays' => '30',
        	

        ]);

        PaymentTerm::create([

        	'name' => 'Net45',
        	'description' => 'El cliente debe pagar la orden 45 dias despues del envio.',
        	'numberDays' => '45',
        	

        ]);

         PaymentTerm::create([

        	'name' => 'Net60',
        	'description' => 'El cliente debe pagar la orden 60 dias despues del envio.',
        	'numberDays' => '60',
        	

        ]);


    }
}
