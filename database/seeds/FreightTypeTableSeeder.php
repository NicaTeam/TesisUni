<?php

use Illuminate\Database\Seeder;
use SalesProgram\FreightType;


class FreightTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FreightType::create([

        	'name' => 'Aereo'
        ]);

        FreightType::create([

        	'name' => 'Maritimo'
        ]);

        FreightType::create([

        	'name' => 'Terrestre'
        ]);

        FreightType::create([

        	'name' => 'Mix1(Aereo-Maritimo)'
        ]);

        FreightType::create([

        	'name' => 'Mix2(Aereo-Terrestre)'
        ]);

         FreightType::create([

        	'name' => 'Mix3(Terrestre-Maritimo)'
        ]);

         FreightType::create([

        	'name' => 'Mix4(Aereo-Maritimo-Terrestre)'
        ]);
    }
}
