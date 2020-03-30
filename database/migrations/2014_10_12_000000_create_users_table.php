<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::create('users', function (Blueprint $table) {
    $table->increments('id');
    $table->string('name');
    $table->string('last_name');
    $table->string('email')->unique();
    $table->string('password');
    $table->smallInteger('status');
        // Caja asociada
    $table->integer('empresa_id')->unsigned()->nullable();
    $table->foreign('empresa_id')->references('id')->on('cajas');
    // Empresa asociada
    $table->integer('caja_id')->unsigned()->nullable();
    $table->foreign('caja_id')->references('id')->on('empresa');
    $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
