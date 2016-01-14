<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImpuestoVencimientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('impuestoVencimiento', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('impuestoId');
          $table->text('textomsg');
          $table->date('fecha');
          $table->string('aplica');
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
        Schema::drop('impuestoVencimiento');
    }
}
