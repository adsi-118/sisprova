<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Denuncia extends Model
{  
	
   protected $table="denuncias";
   protected $fillable = [ 'id','contenido'];

}