<?php

use Illuminate\Database\Seeder;

class TipoPagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_pago')->insert([
            'nb_tipo_pago' => 'Efectivo'
            
        ]);

        DB::table('tipo_pago')->insert([
            'nb_tipo_pago' => 'Punto de venta'          
        ]);

        DB::table('tipo_pago')->insert([
            'nb_tipo_pago' => 'Dólares'          
        ]);


        DB::table('tipo_pago')->insert([
            'nb_tipo_pago' => 'Transferencia'          
        ]);



        DB::table('tipo_pago')->insert([
            'nb_tipo_pago' => 'Pago Movil'          
        ]);
    }
}
