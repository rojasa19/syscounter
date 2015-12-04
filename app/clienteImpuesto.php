<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class clienteImpuesto extends Model
{
    protected $table = 'createClienteImpuesto';
    protected $fillable = 
    [
		'usuarioId', 
		'clienteId', 
		'impuestoId',
		'receptor',
		'diasantes',
		'textomsg'
	];
}
