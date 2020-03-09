<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProveedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre')->nullable();
            $table->string('razon_social')->nullable();
            $table->string('rif')->nullable()->unique();
            $table->string('mail')->nullable();
            $table->string('direccion')->nullable();
            $table->string('telefono')->nullable();
                         // Usuario asociado
            $table->integer('usuario_id')->unsigned()->nullable();
            $table->foreign('usuario_id')->references('id')->on('users');
            
            $table->string('web')->nullable();
            $table->timestamps();

            $table->index(['nombre','rif']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proveedores');
    }
}
