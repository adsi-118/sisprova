<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
 	protected $table = 'comentarios';

 	protected $fillable = ['id','contenido','usuario_id','estado','publicacion_id'];

 	public function usuario(){
 		return $this->belongsTo('App\Models\Usuario', 'usuario_id');
	 }
	 
	 public function publicacion(){
		return $this->belongsTo('App\Models\Publicacion', 'publicacion_id');
	}

}