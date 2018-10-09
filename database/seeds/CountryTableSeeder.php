<?php

use Illuminate\Database\Seeder;

use SalesProgram\Country;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	Country::create([

        	'alfaNumericCode' => 'AUS036',
        	'name' => 'Australia',
        	

        ]);

    	Country::create([

        	'alfaNumericCode' => 'BMUO60',
        	'name' => 'Bermuda',
        	

        ]);



        Country::create([

        	'alfaNumericCode' => 'KHM116',
        	'name' => 'Cambodia',
        	

        ]);

        Country::create([

        	'alfaNumericCode' => 'CMR120',
        	'name' => 'Cameroon',
        	

        ]);

      
        Country::create([

        	'alfaNumericCode' => 'CAN124',
        	'name' => 'Canada',
        	

        ]);

        Country::create([

            'alfaNumericCode' => 'CYP196',
            'name' => 'Cyprus',
            

        ]);

        Country::create([

            'alfaNumericCode' => 'CZE203',
            'name' => 'Czech Republic',
            

        ]);
 

        Country::create([

        	'alfaNumericCode' => 'DNK208',
        	'name' => 'Denmark',
        	

        ]);

        Country::create([

        	'alfaNumericCode' => 'DOM214',
        	'name' => 'Dominican Republic',
        	

        ]);

        Country::create([

        	'alfaNumericCode' => 'EST233',
        	'name' => 'Estonia',
        	

        ]);

        Country::create([

        	'alfaNumericCode' => 'DEU276',
        	'name' => 'Germany',
        	

        ]);

        Country::create([

            'alfaNumericCode' => 'GTM320',
            'name' => 'Guatemala',
            

        ]);

        Country::create([

            'alfaNumericCode' => 'GGY831',
            'name' => 'Guernsey',
            

        ]);

        Country::create([

        	'alfaNumericCode' => 'LVA428',
        	'name' => 'Latvia',
        	

        ]);

        Country::create([

        	'alfaNumericCode' => 'MEX484',
        	'name' => 'Mexico',
        	

        ]);


        Country::create([

        	'alfaNumericCode' => 'NIC558',
        	'name' => 'Nicaragua',
        	

        ]);

        Country::create([

        	'alfaNumericCode' => 'NOR578',
        	'name' => 'Norway',
        	

        ]);

        Country::create([

        	'alfaNumericCode' => 'PAN591',
        	'name' => 'Panama',
        	

        ]);

        Country::create([

        	'alfaNumericCode' => 'POL616',
        	'name' => 'Poland',
        	

        ]);

        Country::create([

        	'alfaNumericCode' => 'PRI630',
        	'name' => 'Puerto Rico',
        	

        ]);

        Country::create([

        	'alfaNumericCode' => 'ROU642',
        	'name' => 'Romania',
        	

        ]);

        Country::create([

        	'alfaNumericCode' => 'RUS643',
        	'name' => 'Russian Federation',
        	

        ]);



        Country::create([

        	'alfaNumericCode' => 'NLD528',
        	'name' => 'Netherlands',
        	

        ]);



        Country::create([

        	'alfaNumericCode' => 'SGP702',
        	'name' => 'Singapore',
        	

        ]);



        Country::create([

        	'alfaNumericCode' => 'SVK703',
        	'name' => 'Slovakia',
        	

        ]);



        Country::create([

        	'alfaNumericCode' => 'ESP724',
        	'name' => 'Spain',
        	

        ]);



        Country::create([

        	'alfaNumericCode' => 'SWE752',
        	'name' => 'Sweden',
        	

        ]);



        Country::create([

        	'alfaNumericCode' => 'CHE756',
        	'name' => 'Switzerland',
        	

        ]);



        Country::create([

        	'alfaNumericCode' => 'TWN158',
        	'name' => 'Taiwan',
        	

        ]);



        Country::create([

        	'alfaNumericCode' => 'THA754',
        	'name' => 'Thailand',
        	

        ]);
    }
}
