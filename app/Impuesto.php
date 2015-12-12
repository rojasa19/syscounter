<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Impuesto extends Model
{
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'impuesto';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['name', 'aplica', 'alcance', 'textomsg', 'vencimiento'];

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

  /**
   * Scope a query to only include active users.
   *
   * @return \Illuminate\Database\Eloquent\Builder
   */
  public function scopeAlcance($query, $alcance)
  {
    if(trim($alcance != ""))
    {
      return $query->where('alcance', 'LIKE', "%$alcance%");
    }
  }

  /**
   * Scope a query to only include active users.
   *
   * @return \Illuminate\Database\Eloquent\Builder
   */
  public function scopeVencimiento($query, $vencimiento)
  {
    if(trim($vencimiento != ""))
    {
      return $query->where('vencimiento', 'LIKE', "%$vencimiento%");
    }
  }
}
