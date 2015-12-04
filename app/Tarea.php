<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    protected $table = 'clienteTarea';

    protected $fillable = 
    [
		'usuarioId', 
		'clienteId', 
		'receptor',
		'titulo',
		'fecha',
		'textomsg'
	];
}
