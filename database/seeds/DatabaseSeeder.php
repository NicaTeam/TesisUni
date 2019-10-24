<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        $this->call(PermissionsTableSeeder::class);
        // $this->call(UsersTableSeeder::class);

        // $this->call(CompanyTypeTableSeeder::class);
        // $this->call(CountryTableSeeder::class);
        // $this->call(PaymentTermsTableSeeder::class);
        // $this->call(CompanyTableSeeder::class);
        // $this->call(CustomerTypeTableSeeder::class);
        // $this->call(TitleTableSeeder::class);
        //$this->call(IncotermTableSeeder::class);
        //$this->call(FreightTypeTableSeeder::class);
        // $this->call(StatusTableSeeder::class);
        // $this->call(FreightProviderSeederTable::class);

       
    }
}
