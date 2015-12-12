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
		'dirigido',
		'titulo',
		'fecha',
		'textomsg'
	];
}
