<?php

use Illuminate\Database\Seeder;
use SalesProgram\Status;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create([

        	'name'=>'Creada'


        ]);

        Status::create([

        	'name'=>'Revisado'


        ]);

        Status::create([

        	'name'=>'Aprobada'


        ]);

        Status::create([

        	'name'=>'Empacada'


        ]);

         Status::create([

        	'name'=>'Pagada'


        ]);


        Status::create([

        	'name'=>'Enviada'


        ]);


        Status::create([

        	'name'=>'Crédito'

        ]);

        Status::create([

            'name'=>'Contado'

        ]);

        
    }
}
