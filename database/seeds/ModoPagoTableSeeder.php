<?php

use Illuminate\Database\Seeder;

class ModoPagoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modo_pago')->insert([
            'nb_modo_pago' => 'Semanal'
        ]);
        DB::table('modo_pago')->insert([
            'nb_modo_pago' => 'Quincenal'
        ]);
        DB::table('modo_pago')->insert([
            'nb_modo_pago' => 'Mensual'
        ]);


    }
}
