<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('rif');
            $table->string('direccion');
            $table->string('telefono');
            $table->string('fecha_emision');
            // Usuario asociado
            $table->integer('usuario_id')->unsigned();

            $table->timestamps();
            $table->softDeletes();
            $table->index(['fecha_emision']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresa');
    }
}
