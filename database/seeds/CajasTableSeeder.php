<?php

use Illuminate\Database\Seeder;

class CajasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('cajas')->insert([
            'nu_caja' => '1'
        ]);

        DB::table('cajas')->insert([
            'nu_caja' => '2'         
        ]);
    }
}
