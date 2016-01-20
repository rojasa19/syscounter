<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'cliente';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
                          'name',
                          'abreviacion',
                          'telefono',
                          'cruitPrimero',
                          'cruitSegundo',
                          'cruitTercero',
                          'cruitEmpresa',
                          'clavefiscal',
                          'email',
                          'contribuyente',
                          'idUsers'
                        ];

  /**
   * The attributes excluded from the model's JSON form.
   *
   * @var array
   */
  protected $hidden = ['remember_token'];

  /**
   * Scope a query to only include active users.
   *
   * @return \Illuminate\Database\Eloquent\Builder
   */
  public function scopeName($query, $name)
  {
    if(trim($name != ""))
    {
      return $query->where('name', 'LIKE', "%$name%");
    }
  }
}