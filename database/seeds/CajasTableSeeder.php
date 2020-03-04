<?php

use Illuminate\Database\Seeder;
use App\Models\Caja;
class CajasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         

        $user = new Caja;
        $user->nu_caja = 1;
        $user->status = 0;
        $user->save();


        $user = new Caja;
        $user->nu_caja = 2;
        $user->status = 0;
        $user->save();




    }
}
