<?php

use Illuminate\Database\Seeder;
use SalesProgram\FreightProvider;

class FreightProviderSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	FreightProvider::create([


    		'name' => 'American Airlines Cargo',
            'address' => 'Rotonda Güegüense 300mts al Sur',
            'email'=>  'epxtc@aa.com',
            'telephone'=>'2266 5382 -  855-223-7982 - 817-785-4635 ',
            'contact_name'=> '-',

    	]);

    	FreightProvider::create([


    		'name' => 'DHL Express & Logistics Nicaragua',
            'address' => 'Carretera Norte, Complejo Industrial Portezuelo, de FETESA 1c al este , 200 mts al sur Managua, Nicaragua',
            'email'=>  '-',
            'telephone'=>'+505 2251 2500',
            'contact_name'=> '-',

    	]);
        
    }
}
