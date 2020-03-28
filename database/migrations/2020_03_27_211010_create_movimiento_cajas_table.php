<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovimientoCajasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimiento_cajas', function (Blueprint $table) {
            $table->increments('id');
            // Usuario asociado
            $table->integer('usuario_id')->unsigned();
            $table->foreign('usuario_id')->references('id')->on('users');
            // Tipo comprobante
            $table->integer('tipo_comprobante_id')->unsigned();
            $table->foreign('tipo_comprobante_id')->references('id')->on('tipo_comprobantes');

            // Tipo de pago asociado
            $table->integer('tipo_pago_id');
            $table->foreign('tipo_pago_id')->references('id')->on('tipo_pago');

            // Moneda
            $table->integer('moneda_id');
            $table->foreign('moneda_id')->references('id')->on('monedas');
            $table->double('cotizacion')->default(1);

            // Cliente asociado
            $table->string('cliente');


            // Caja asociada
            $table->integer('caja_id');
            $table->foreign('caja_id')->references('id')->on('cajas');

            $table->string('fecha');

            $table->string('descripcion');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movimiento_cajas');
    }
}
