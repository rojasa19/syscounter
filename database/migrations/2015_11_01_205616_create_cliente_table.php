<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('cliente', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->string('abreviacion');
          $table->integer('telefono');
          $table->integer('cruitPrimero');
          $table->integer('cruitSegundo');
          $table->integer('cruitTercero');
          $table->string('email')->unique();
          $table->enum('contribuyente', ['SA', 'SRL', 'SH', 'RI', 'MONO']);
          $table->integer('idUsers');
          $table->rememberToken();
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
        //
    }
}
