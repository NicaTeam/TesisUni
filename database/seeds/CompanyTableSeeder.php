<?php

use Illuminate\Database\Seeder;
use SalesProgram\Company;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Company::create([

        	'name' => 'House of Horvath',
        	'countries_id' => 1,
        	'company_types_id' => 1,
        	'shippingAddress' => 'Any address',
        	'telephone' => 3487139,
        	'payment_term_id' => 3,
        	

        ]);

        Company::create([

        	'name' => 'Raktos Distributors Services PTY, (Cigar Hut)',
        	'countries_id' => 4,
        	'company_types_id' => 1,
        	'shippingAddress' => 'Any address',
        	'telephone' => 387987143,
        	'payment_term_id' => 3,
        	

        ]);


        Company::create([

        	'name' => 'Drew Estate Tobacco Company S.A',
        	'countries_id' => 3,
        	'company_types_id' => 2,
        	'shippingAddress' => 'Any address',
        	'telephone' => 27149000,
        	'payment_term_id' => 1,
        	

        ]);

        Company::create([

            'name' => 'Creez International Pte Ltd',
            'countries_id' => 3,
            'company_types_id' => 1,
            'shippingAddress' => '3 Lor 42 Geylang # 06-02 Spore 398025',
            'telephone' => 'Tel; +65 6401 6898/Fax; +65 64019928 Mob; +65 8180 2258',
            'payment_term_id' => 1,

        ]);


    }
}
