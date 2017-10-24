<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{  
	
   protected $table="categorias";
   protected $fillable = [ 'nombre','mesa_id','estado'];

    
	 public function categoria(){
		return $this->belongsTo('App\Models\Mesa', 'mesa_id');
	}
}
