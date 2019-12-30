<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model
{
  protected $table = 'ingredientes';
  protected $fillable = ['id', 'ingrediente', 'cantidad_personas', 'cantidad_ingrediente', 'unidad', 'id_menu'];
}
