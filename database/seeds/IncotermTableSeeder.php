<?php

use Illuminate\Database\Seeder;
use SalesProgram\Incoterm;

class IncotermTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Incoterm::create([

        	'name' => 'Ex Works',
        	'description' => 'El vendedor pone mercancía a disposición del comprador en sus propias instalaciones: fábrica, almacén, etc. Todos los gastos a partir de ese momento son por cuenta del comprador.

        	<br>

			El incoterm EXW se puede utilizar con cualquier tipo de transporte o con una combinación de ellos (conocido como transporte multimodal). Es decir el proveedor se encarga de la logística y el traslado necesario para que el comprador tenga el suministro del producto en el mismo lugar donde desempeña la tarea productiva. Este Incoterm no sufrió modificación en relación a los Incoterms año 2000.'


        ]);

         Incoterm::create([

        	'name' => 'Free Alongside Ship-FAS',
        	'description' => 'El vendedor entrega la mercancía en el muelle pactado del puerto de carga convenido; esto es, al lado del barco. El incoterm FAS es propio de mercancías de carga a granel o de carga voluminosa porque se depositan en terminales del puerto especializadas, que están situadas en el muelle.

			El vendedor es responsable de las gestiones y costes de la aduana de exportación (en las versiones anteriores a Incoterms 2000, el comprador organizaba el despacho aduanero de exportación).'


        ]);


         Incoterm::create([

        	'name' => 'Free On Board-FOB',
        	'description' => 'El vendedor entrega la mercancía sobre el buque. El comprador se hace cargo de designar y reservar el transporte principal (buque)

			El incoterm FOB es uno de los más usados en el comercio internacional. Se debe utilizar para carga general (bidones, bobinas, contenedores, etc.) de mercancías, no utilizable para granel.

			El incoterm FOB se utiliza exclusivamente para transporte en barco, ya sea marítimo o fluvial.'


        ]);

        Incoterm::create([

        	'name' => 'Free Carrier-FCA',
        	'description' => 'El vendedor se compromete a entregar la mercancía en un punto acordado dentro del país de origen, que pueden ser los locales de un transitario, una estación ferroviaria... (este lugar convenido para entregar la mercancía suele estar relacionado con los espacios del transportista). Se hace cargo de los costes hasta que la mercancía está situada en ese punto convenido.

			El incoterm FC se puede utilizar con cualquier tipo de transporte: transporte aéreo, ferroviario, por carretera y en contenedores/transporte multimodal. Sin embargo, es un incoterm poco usado.'


        ]);

        Incoterm::create([

        	'name' => 'Cost and Freight-CFR',
        	'description' => 'El vendedor se hace cargo de todos los costes, incluido el transporte principal, hasta que la mercancía llegue al puerto de destino. Sin embargo, el riesgo se transfiere al comprador en el momento que la mercancía se encuentra cargada en el buque, en el país de origen. Se debe utilizar para carga general, que se transporta en contenedores; NO es apropiado para los graneles.

			El incoterm CFR sólo se utiliza para transporte en barco, ya sea marítimo o fluvial.'


        ]);

         Incoterm::create([

        	'name' => 'Cost, Insurance and Freight-CIF',
        	'description' => 'El vendedor se hace cargo de todos los costes, incluidos el transporte principal y el seguro, hasta que la mercancía llegue al puerto de destino. Aunque el seguro lo ha contratado el vendedor , el beneficiario del seguro es el comprador.

			Como en el incoterm anterior, CFR, el riesgo se transfiere al comprador en el momento que la mercancía se encuentra cargada en el buque, en el país de origen. El incoterm CIF es uno de los más usados en el comercio internacional porque las condiciones de un precio CIF son las que marcan el valor en aduana de un producto que se importa.7​ Se debe utilizar para carga general o convencional.

			El incoterm CIF es exclusivo del medio marítimo.'


        ]);

        Incoterm::create([

        	'name' => 'Carriage Paid To-CPT',
        	'description' => 'El vendedor se hace cargo de todos los costes, incluido el transporte principal, hasta que la mercancía llegue al punto convenido en el país de destino. Sin embargo, el riesgo se transfiere al comprador en el momento de la entrega de la mercancía al transportista dentro del país de origen. Si se utilizan varios transportistas para llegar a destino, el riesgo se transmite cuando la mercancía se haya entregado al primero .

			El incoterm CPT se puede utilizar con cualquier modo de transporte incluido el transporte multimodal (combinación de diferentes tipos de transporte para llegar a destino).'


        ]);


        Incoterm::create([

        	'name' => 'Carriage and Insurance Paid-CIP',
        	'description' => 'El vendedor se hace cargo de todos los costes, incluidos el transporte principal y el seguro, hasta que la mercancía llegue al punto convenido en el país de destino. Aunque el seguro lo ha contratado el vendedor, el beneficiario del seguro es el comprador.

			El incoterm CIP se puede utilizar con cualquier modo de transporte o con una combinación de ellos (transporte multimodal) .'


        ]);






       
    }
}
