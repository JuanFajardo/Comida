<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
  protected $table = 'menus';
  protected $fillable = ['id', 'menu', 'descripcion', 'id_grupo', 'id_tiempo'];

}
