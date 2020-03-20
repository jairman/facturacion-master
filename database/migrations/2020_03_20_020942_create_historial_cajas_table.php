<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistorialCajasTable extends Migration
{
    /*Tabla para llevar el manejo de apertura y cierres de caja*/

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial_cajas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion');
            $table->integer('usuario_id');
            $table->integer('caja_id');
            $table->string('fecha');
            $table->softDeletes();
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
        Schema::dropIfExists('historial_cajas');
    }
}
