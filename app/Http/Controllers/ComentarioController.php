<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Comentario;
use App\Models\Usuario;
use DB;

class ComentarioController extends Controller
{
    public function index(){
	}

 	public function store(Request $request){
 		$datos = [];

        $datos['contenido']     = $request->contenido;
       
        // DEBE TRAER EL ID DEL USUARIO, SESIÓN
        $datos['usuario_id']    = 10;
        $datos['estado']        = 1;    
        $datos['publicacion_id']     = $request->pub_id;    

        $nombre = Usuario::where('id', 10)->select('nombre','apellido')->get();   

        $datos['nombre'] = $nombre[0]['nombre'];        
        $datos['apellido'] = $nombre[0]['apellido'];

        if($datos['contenido'] == ""){
       		$msj =1;
       		echo json_encode($msj);       
        }else{
        	Comentario::create($datos);
        	$datos['id'] = DB::table('comentarios')->max('id');
        	echo json_encode($datos);               	        	        
        }

  	}

  	public function show($id){

  		$comentarios = DB::table('comentarios')
		  		->select('comentarios.id','comentarios.contenido','usuarios.nombre','usuarios.apellido')
		  		->join('usuarios', 'usuarios.id', '=', 'comentarios.usuario_id')  		
		  		->where('comentarios.estado','=',1)  	
		  		->where('comentarios.publicacion_id','=',$id)  	
		  		->get();


        if ($comentarios) {
			echo json_encode($comentarios);     
        }else{
        	$msj = 1;
			echo json_encode($msj);             	
        }                                                                                     
                                
	}

	public function create(){	
	}

	public function edit($id){
				
		$comentario = Comentario::where('id', $id)->select('contenido')->get();  
		echo "<pre>";
		print_r($comentario);

		die();
		echo json_encode($comentario);
	}

	public function update(Request $request){	

		Comentario::where('id', $request->id)->update(['contenido' =>$request->datos]);

		$nombre = Usuario::where('id', 10)->select('nombre','apellido')->get();  

		$datos['nombre'] = $nombre[0]['nombre'];        
        $datos['apellido'] = $nombre[0]['apellido'];

        echo json_encode($datos);
	}

	public function deshabilitar($id){		
		Comentario::where('id', $id)->update(['estado' => 0]);		
		echo 1;
	}
}
