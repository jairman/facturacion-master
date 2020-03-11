<?php

use Illuminate\Database\Seeder;

class TasaIvaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('tasas_iva')->insert([
            'nombre' => 'Básica',
            'tasa' => 16
        ]);
        DB::table('tasas_iva')->insert([
            'nombre' => 'Mínimo',
            'tasa' => 12
        ]);
        DB::table('tasas_iva')->insert([
            'nombre' => 'Exento',
            'tasa' => 0
        ]);
    }
}
