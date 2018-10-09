<?php

use Illuminate\Database\Seeder;
use SalesProgram\CustomerType;

class CustomerTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CustomerType::create([

        	'clienteTipo' => 'Master',
        	'descripcion' => 'Este tipo de cliente es un distribuidor que vende en varios paises.',
        	
        ]);

        CustomerType::create([

        	'clienteTipo' => 'General',
        	'descripcion' => 'Este tipo de cliente es un distribuidor que vende en un solo  pais.',
        	
        ]);

        CustomerType::create([

        	'clienteTipo' => 'Duty Free',
        	'descripcion' => 'Este tipo de cliente es un distribuidor que vende en Duty Free.',
        	
        ]);
    }
}
