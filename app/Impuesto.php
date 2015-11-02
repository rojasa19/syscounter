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
  protected $fillable = ['name', 'aplica'];

  /**
   * The attributes excluded from the model's JSON form.
   *
   * @var array
   */
  protected $hidden = ['remember_token'];
}
