<?php

use Illuminate\Database\Seeder;
use SalesProgram\Title;

class TitleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Title::create([

         'name' => 'Contacto de envio de cliente',

        ]);

        Title::create([

         'name' => 'Contacto de Envio del agente aduanero',

        ]);
    }
}
