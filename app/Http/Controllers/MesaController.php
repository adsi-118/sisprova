<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Mesa;
use DB;

class MesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $mesas = DB::table('mesas')
                    ->select('mesas.id', 'mesas.nombre', 'mesas.estado',  DB::raw('count(categorias.id) as categorias'))
                    ->where('mesas.estado', 1)
                    ->leftjoin('categorias', 'mesas.id', '=', 'categorias.mesa_id')
                    ->groupBy('mesas.nombre')
                    ->get();

        $publicaciones = DB::table('mesas')
                            ->select( DB::raw('count(publicaciones.id) as publicaciones'))
                            ->where('mesas.estado', 1 )
                            ->leftjoin('categorias', 'mesas.id', '=', 'categorias.mesa_id')
                            ->leftjoin('publicaciones', 'categorias.id', '=', 'publicaciones.categoria_id')
                            ->groupBy('mesas.nombre')
                            ->get();


        foreach ($mesas as $key => $mesa) {
            $mesa->publicaciones = $publicaciones[$key]->publicaciones;
        }


         return view('mesas.ver', compact('mesas'));
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
        
        $datos['nombre']    = $request->nombre;       
        $datos['estado']    = 1;
             
        Mesa::create($datos);
             
        return  redirect('mesas')->with('message', 'Mesa creada!');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mesas = Mesa::select('nombre', 'id')->where('id', $id)->get();
        echo json_encode($mesas);
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

    public function update(Request $request)
    {
        $actualizar['id'] = $request->id;
        $actualizar['nombre'] = $request->nombre;
        
        Mesa::where('id', $actualizar['id'])->update(['nombre' => $actualizar['nombre']]);        
    }

    public function deshabilitar($id){
        
        Mesa::where('id', $id)->update(['estado' => 0]);

        return redirect('mesas')->with('message', 'Mesa eliminada Correctamente!');
    }
}