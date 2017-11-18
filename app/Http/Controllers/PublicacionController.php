<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Publicacion;
use App\Models\Categoria;
use App\Models\Mesa;
use App\Models\Comentario;
use App\Models\Denuncia;
use DB;

class PublicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publicaciones = Publicacion::all()->where('estado',1);
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
        $datos['denuncias']     = 0;    
        $datos['valoracion']    = 0;    
       

            if ($request->file('imagen')) {
                $datos['imagen'] = rand(0, 999999) . "_" . $request->file('imagen')->getClientOriginalName();

                $request->file('imagen')->move(public_path('images/imgPublicaciones/'), $datos['imagen']);
            }else{
            $datos['imagen'] = NULL;
            }
        
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
        $publicaciones = DB::table('publicaciones') 
                                ->select('publicaciones.id','usuario_id','denuncias','valoracion','texto','imagen','publicaciones.estado','categoria_id','publicaciones.created_at','nombre','apellido',
                                    'foto_perfil')
                                ->join('usuarios', 'usuarios.id', '=', 'publicaciones.usuario_id')
                                ->where('categoria_id', $id)
                                ->where('publicaciones.estado',1)
                                ->orderby('publicaciones.created_at', 'desc')->get();

        $categoria = Categoria::where('id', $id)->select('id', 'nombre','mesa_id')->get();

        $denuncias = Denuncia::all();

        $mesa = Mesa::where('id', $categoria[0]->mesa_id)->select('id', 'nombre')->get();

        $comentarios = DB::table('comentarios')
                            ->select('contenido','publicacion_id','usuarios.nombre','usuarios.apellido')
                            ->join('publicaciones', 'publicaciones.id', '=', 'comentarios.publicacion_id')
                            ->join('usuarios', 'usuarios.id', '=', 'publicaciones.usuario_id')
                            ->join('categorias', 'categorias.id', '=', 'publicaciones.categoria_id')
                            ->join('mesas', 'mesas.id', '=', 'categorias.mesa_id')
                            ->where('comentarios.estado','=',1)
                            ->where('categoria_id','=',$categoria[0]->id)
                            ->get();

        return view('publicaciones.ver', ['publicaciones' => $publicaciones, 'categoria' => $categoria[0],
            'mesa' => $mesa[0],'denuncias'=>$denuncias,'comentarios' => $comentarios]);        

        
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

        if ($request->file('imagen')) {
                $imagen = rand(0, 999999) . "_" . $request->file('imagen')->getClientOriginalName();

                $request->file('imagen')->move(public_path('images/imgPublicaciones/'), $imagen);
        }else{
            $imagen = NULL;
        }
    
        Publicacion::where('id', $request->id)->update(['usuario_id' =>10,'denuncias' =>0,'valoracion' =>0,'texto' =>$request->texto
        ,'estado' =>1,'categoria_id' =>$categoria,'imagen'=>$imagen]);

        return  redirect('publicaciones/'.$request->categoria_id)->with('message', 'Publicacion editada Correctamente!');; 

    }

    public function deshabilitar($categoria,$id){
        
        Publicacion::where('id', $id)->update(['estado' => 0]);

        return redirect('publicaciones/'.$categoria)->with('message', 'Publicacion eliminada Correctamente!');
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