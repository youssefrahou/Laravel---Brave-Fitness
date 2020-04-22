<?php

namespace App\Http\Controllers;

use App\Comentario;
use App\Respuesta_comentario;
use Illuminate\Http\Request;

class Respuesta_comentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $respuesta = $request->all();
        $respuesta['fecha_hora'] = now();

        Respuesta_comentario::create($respuesta); //respondo el comentario
/*
ESTO HACE QUE CUANDO CONTESTE UNA TERCERA PERSONA TAMVIEN SE MARQ COMO LEID
        $comentario = Comentario::find($respuesta['comentario_id']);
        $comentario->leido = 1;
        $comentario->save(); //marco como leido el comentario que ha contestado
        */ 

        //Redirigir a la url anterior
        return redirect()->back()->with('mensaje', 'La respuesta se ha publicado correctamente!');
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
        //
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
        //
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
