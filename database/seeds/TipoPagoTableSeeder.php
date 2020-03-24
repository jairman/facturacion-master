<?php

use Illuminate\Database\Seeder;

class TipoPagoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('tipo_pago_empleado')->insert([
            'nb_tipo_pago_empleado' => 'Bono'
            
        ]);

        DB::table('tipo_pago_empleado')->insert([
            'nb_tipo_pago_empleado' => 'Sueldo'          
        ]);

        DB::table('tipo_pago_empleado')->insert([
            'nb_tipo_pago_empleado' => 'Deduccion'          
        ]);

    }
}
