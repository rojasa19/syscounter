<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImpuestoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('impuesto', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name')->unique();
          $table->enum('aplica', ['TO', 'SA', 'SRL', 'SH', 'RI', 'MONO']);
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
      Schema::drop('impuesto');
    }
}
