<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTareaClienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clienteTarea', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('usuarioId');
          $table->integer('clienteId');
          $table->enum('receptor', ['todos', 'contador', 'cliente', 'ninguno']);
          $table->string('titulo');
          $table->date('fecha');
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
        Schema::drop('clienteTarea');
    }
}
