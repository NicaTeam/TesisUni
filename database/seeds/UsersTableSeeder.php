<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;
use SalesProgram\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(SalesProgram\User::class, 5)->create();

        User::create([

            'name' => 'Juan Carlos Arteta',
            'email' => 'jcaizcano@drewestate.com',
            'password' => bcrypt('123456'),
            'company_id' => 3,
            // 'remember_token' => str_random(20),

        ]);


        User::create([

            'name' => 'Misael Lopez',
            'email' => 'mlopez@drewestate.com',
            'password' => bcrypt('123456'),
            'company_id' => 3,
            // 'remember_token' => str_random(20),

        ]);

        User::create([

            'name' => 'Ricardo Ortiz',
            'email' => 'rortiz@drewestate.com',
            'password' => bcrypt('123456'),
            'company_id' => 3,
            // 'remember_token' => str_random(20),

        ]);

        User::create([

            'name' => 'Orlando Benavidez',
            'email' => 'obenavides@drewestate.com',
            'password' => bcrypt('123456'),
            'company_id' => 3,
            // 'remember_token' => str_random(20),

        ]);

        User::create([

            'name' => 'Manuel Rubio',
            'email' => 'mrubio@drewestate.com',
            'password' => bcrypt('123456'),
            'company_id' => 3,
            // 'remember_token' => str_random(20),

        ]);

        User::create([

            'name' => 'Mike Garcia',
            'email' => 'mgarcia@drewestate.com',
            'password' => bcrypt('123456'),
            'company_id' => 3,
            // 'remember_token' => str_random(20),

        ]);

        User::create([

            'name' => 'Rene Torrez',
            'email' => 'rtorrez@drewestate.com',
            'password' => bcrypt('123456'),
            'company_id' => 3,
            // 'remember_token' => str_random(20),

        ]);



        Role::create([

        	'name' =>'Admin',
        	'slug' =>'admin',
        	'special' => 'all-access'

        ]);


        Role::create([

            'name' =>'Responsable de IT',
            'slug' =>'informatica',
            'special' => null

        ]);


        Role::create([

            'name' =>'Responsable de ventas',
            'slug' =>'ventas',
            'special' => null

        ]);


        Role::create([

            'name' =>'Responsable de empaque',
            'slug' =>'empaque',
            'special' => null

        ]);


        Role::create([

            'name' =>'Responsable de exportaciones',
            'slug' =>'exportaciones',
            'special' => null

        ]);


        Role::create([

            'name' =>'Responsable de finanzas',
            'slug' =>'finanzas',
            'special' => null

        ]);


    }
}
