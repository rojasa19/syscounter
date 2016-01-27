<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImpuestoVencimiento extends Model
{
   /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'impuestoVencimiento';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['impuestoId', 'fecha', 'aplica', 'textomsg'];
}