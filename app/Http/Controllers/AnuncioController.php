<?php

namespace App\Http\Controllers;



use App\Http\Requests;
use Request;
use App\Models\Anuncio;
class AnuncioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $anuncios = Anuncio::all()->where('estado',1);

        if (Request::ajax()) {
            return response()->json($anuncios);
        }

        return view('anuncios.ver', compact('anuncios'));

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
        //
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
        $anuncios = Anuncio::select('titulo','id','foto')->where('id',$id)->get();
        echo json_encode($anuncios);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {


       Anuncio::where('id',  $_REQUEST['id'])->update(['titulo' =>  $_REQUEST['titulo']]);
       $anuncios = Anuncio::select('titulo','id','foto')->where('id',$_REQUEST['id'])->get();
        echo json_encode($anuncios);
    }

    public function deshabilitar($id)
    {
        Anuncio::where('id', $id)->update(['estado' => 0]);
        echo "Anuncio eliminado!!";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Anuncio::destroy($id);
    }
}
