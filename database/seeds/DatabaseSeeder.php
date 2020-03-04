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
        $this->call(RolesAndPermissionsSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(TasaIvaSeeder::class);
        $this->call(MonedaSeeder::class);
        $this->call(TipoDocumentoSeeder::class);
        $this->call(TipoComprobanteSeeder::class);
        $this->call(TipoPagoSeeder::class);
        $this->call(CajasTableSeeder::class);

    }
}
