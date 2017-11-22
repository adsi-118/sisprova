<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{

 $table = 'usuarios';
$fillable = ['nombre', 'apellido', 'fecha_nacimiento', 'email', 'password', 'genero', 'rol_id', 'estado', 'centro_id'];
    
}
