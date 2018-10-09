<?php

use Illuminate\Database\Seeder;
use SalesProgram\CompanyType;

class CompanyTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         CompanyType::create([

        	'name' => 'Cliente',
        	

        ]);

         CompanyType::create([

        	'name' => 'Fabrica',
        	

        ]);

        CompanyType::create([

        	'name' => 'Agente Aduanero',
        	

        ]);
    }
}
