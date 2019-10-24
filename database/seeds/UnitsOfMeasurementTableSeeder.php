<?php

use Illuminate\Database\Seeder;
use SalesProgram\UnitOfMeasurement;

class UnitsOfMeasurementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UnitOfMeasurement::create([

        	'name' => 'box/caja'


        ]);


        UnitOfMeasurement::create([

        	'name' => 'mazo/bundle'


        ]);
    }
}
