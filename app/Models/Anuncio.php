<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
    protected $table = 'anuncios';

 	protected $fillable = ['titulo','texto','foto','estado','usuario_id', 'created_at','updated_at'];

}