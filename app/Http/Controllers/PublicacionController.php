<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Models\Publicacion;
use App\Models\Categoria;
use App\Models\Mesa;

class PublicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publicaciones = Publicacion::all();
        return view('publicaciones.ver', compact('publicaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datos = [];

        $datos['texto']         = $request->texto;
        $datos['categoria_id']  = $request->categoria_id;

        // DEBE TRAER EL ID DEL USUARIO, SESIÓN

        $datos['usuario_id']    = 10;
        $datos['estado']        = 1;
        
        $ultimo = Publicacion::create($datos);
        
        /*
        echo "<pre>";
        print_r( $ultimo->with('usuario')->get()->toArray() );
        die();

        if($request->ajax()){
            return response()->json();
        }*/

        return  redirect('publicaciones/'.$request->categoria_id)->with('message', 'Publicación creada!');; 
    }

    /**
     * Display the specified resource.
     
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $publicaciones = Publicacion::where('categoria_id', $id)->orderby('created_at', 'desc')->get();

        $categoria = Categoria::where('id', $id)->select('id', 'nombre','mesa_id')->get();

        $mesa = Mesa::where('id', $categoria[0]->mesa_id)->select('id', 'nombre')->get();

        return view('publicaciones.ver', ['publicaciones' => $publicaciones, 'categoria' => $categoria[0], 'mesa' => $mesa[0]]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $publicaciones = Publicacion::find($id);
        return view('publicaciones.editar', compact('publicaciones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
   
        //$actualizar['foto'] = $request->FOTO;
        $categoria = $request->categoria_id;
    
        Publicacion::where('id', $request->id)->update(['usuario_id' =>10,'denuncias' =>0,'valoracion' =>0,'texto' =>$request->texto
        ,'estado' =>1,'categoria_id' =>$categoria]);

        return  redirect('publicaciones/'.$request->categoria_id)->with('message', 'Publicacion editada Correctamente!');; 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
