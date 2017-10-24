<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Mesa;

class MesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mesas = Mesa::where('estado', 1)->get();
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
}
