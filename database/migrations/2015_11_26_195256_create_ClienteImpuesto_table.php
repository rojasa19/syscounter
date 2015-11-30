<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClienteImpuestoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('createClienteImpuesto', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('usuarioId');
          $table->integer('clienteId');
          $table->integer('impuestoId');
          $table->enum('receptor', ['todos', 'contador', 'cliente', 'ninguno']);
          $table->string('diasantes');
          $table->text('textomsg');
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
        Schema::drop('createClienteImpuesto');
    }
}
