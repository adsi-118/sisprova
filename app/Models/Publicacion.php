<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    protected $table = 'publicaciones';

 	protected $fillable = ['usuario_id','created_at','valoracion','texto','foto', 'categoria_id'];

 	public function usuario(){
 		return $this->belongsTo('App\Models\Usuario', 'usuario_id');
	 }
	 
	 public function categoria(){
		return $this->belongsTo('App\Models\Categoria', 'categoria_id');
	}

}
