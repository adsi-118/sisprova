<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Categoria;
use App\Models\Mesa;
use DB;
use Validator;

class CategoriaController extends Controller{
	
	public function index(){
		$categorias = Categoria::all()->where('estado',1);
		return view('categorias.ver', compact('categorias'));
	}

	public function store(Request $request){
		$datos = [];

        $datos['nombre']    = $request->nombre;
        $datos['mesa_id']   = $request->mesa_id;
        $datos['estado']    = 1;
     
        Categoria::create($datos);
       
        return  redirect('categorias/'.$request->mesa_id)->with('message', 'Categoria creada!');; 
	}


	public function show($id){	

		$categorias=DB::table('categorias')
                    ->select('categorias.nombre','categorias.id','categorias.mesa_id', DB::raw('count(publicaciones.id) as publicaciones'))
                    ->leftjoin('publicaciones', 'categorias.id', '=', 'publicaciones.categoria_id')
                    ->groupBy('categorias.nombre')
                    ->where('categorias.mesa_id', $id)
                    ->where('categorias.estado', 1 )
                    ->get();
       
		$mesa = Mesa::where('id', $id)->select('id', 'nombre')->get();	 

		return view('categorias.ver', ['categorias' => $categorias, 'mesa' => $mesa[0]]);  
	}

	public function create(){
	
	}


	public function edit($id)
	{
		$categoria = Categoria::find($id);
		return view('categorias.editar',compact('categoria'));
	}

	public function update(Request $request)
	{	

		Categoria::where('id',  $request->id)->update(['nombre' => $request->nombre]);

		return  redirect('categorias/'.$request->mesa_id)->with('message', 'Categoria editada!'); 
	}

	public function deshabilitar($mesa,$id){
		
        Categoria::where('id', $id)->update(['estado' => 0]);

        return redirect('categorias/'.$mesa)->with('message', 'Categoria eliminada Correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Categoria::destroy($id);
    }
}