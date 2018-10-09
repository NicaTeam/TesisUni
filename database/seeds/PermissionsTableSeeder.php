<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	//price-registration
        // Permission::create([

        // 	'name' => 'Navegar registros de precios',
        // 	'slug' =>'price_registration.index',

        // ]);

        // Permission::create([

        // 	'name' => 'Ver registros de precios',
        // 	'slug' =>'price_registration.show',

        // ]);

        // Permission::create([

        // 	'name' => 'Crear registros de precios',
        // 	'slug' =>'price_registration.create',

        // ]);

        // Permission::create([

        // 	'name' => 'Editar registros de precios',
        // 	'slug' =>'price_registration.edit',

        // ]);

        // Permission::create([

        // 	'name' => 'Eliminar registros de precios',
        // 	'slug' =>'price_registration.destroy',

        // ]);




        // //cigars

        // Permission::create([

        // 	'name' => 'Navegar cigars',
        // 	'slug' =>'cigars.index',

        // ]);

        // Permission::create([

        // 	'name' => 'Ver cigars',
        // 	'slug' =>'cigars.show',

        // ]);

        // Permission::create([

        // 	'name' => 'Crear cigars',
        // 	'slug' =>'cigars.create',

        // ]);

        // Permission::create([

        // 	'name' => 'Editar cigars',
        // 	'slug' =>'cigars.edit',

        // ]);

        // Permission::create([

        // 	'name' => 'Eliminar cigars',
        // 	'slug' =>'cigars.destroy',

        // ]);



        // //users

        // Permission::create([

        // 	'name' => 'Navegar users',
        // 	'slug' =>'users.index',

        // ]);

        // Permission::create([

        // 	'name' => 'Ver users',
        // 	'slug' =>'users.show',

        // ]);

        // Permission::create([

        // 	'name' => 'Create users',
        // 	'slug' =>'users.create',

        // ]);

        // Permission::create([

        // 	'name' => 'Editar users',
        // 	'slug' =>'users.edit',

        // ]);

        // Permission::create([

        // 	'name' => 'Eliminar users',
        // 	'slug' =>'users.destroy',

        // ]);


        // // Roles
        // Permission::create([

        // 	'name' => 'Navegar roles',
        // 	'slug' =>'roles.index',

        // ]);

        // Permission::create([

        // 	'name' => 'Ver roles',
        // 	'slug' =>'roles.show',

        // ]);

        // Permission::create([

        // 	'name' => 'Crear roles',
        // 	'slug' =>'roles.create',

        // ]);

        // Permission::create([

        // 	'name' => 'Editar roles',
        // 	'slug' =>'roles.edit',

        // ]);

        // Permission::create([

        // 	'name' => 'Eliminar roles',
        // 	'slug' =>'roles.destroy',

        // ]);

        //Companies
        // Permission::create([

        //  'name' => 'Crear compañia cliente',
        //  'slug' =>'company.create',

        // ]);

        // Permission::create([

        //  'name' => 'Navegar lista compañia cliente',
        //  'slug' =>'company.index',

        // ]);

        // Permission::create([

        //  'name' => 'Actualizar compañia cliente',
        //  'slug' =>'company.edit',

        // ]);

        // Permission::create([

        //  'name' => 'Ver compañia cliente',
        //  'slug' =>'company.show',

        // ]);

        // Permission::create([

        //  'name' => 'Deshabilitar compañia cliente',
        //  'slug' =>'company.destroy',

        // ]);


        //Customs Agencies
        Permission::create([

         'name' => 'Navegar agencia aduanera.',
         'slug' =>'customsAgency.index',

        ]);

        Permission::create([

         'name' => 'Crear agencia aduanera.',
         'slug' =>'customsAgency.create',

        ]);

        Permission::create([

         'name' => 'Ver agencia aduanera.',
         'slug' =>'customsAgency.show',

        ]);

        Permission::create([

         'name' => 'Editar agencia aduanera.',
         'slug' =>'customsAgency.edit',

        ]);

        

        
        //Incoterms
        Permission::create([

         'name' => 'Navegar incoterm',
         'slug' =>'incoterm.index',

        ]);

        Permission::create([

         'name' => 'Ver incoterm',
         'slug' =>'incoterm.show',

        ]);

        Permission::create([

         'name' => 'Editar incoterm',
         'slug' =>'incoterm.edit',

        ]);

        Permission::create([

         'name' => 'Actualizar incoterm',
         'slug' =>'incoterm.update',

        ]);

        Permission::create([

         'name' => 'Crear incoterm',
         'slug' =>'incoterm.create',

        ]);

        Permission::create([

         'name' => 'Guardar incoterm',
         'slug' =>'incoterm.store',

        ]);


    }
}
