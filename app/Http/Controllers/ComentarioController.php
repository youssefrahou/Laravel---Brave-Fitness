<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comentario;

class ComentarioController extends Controller
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
        $comentario = new Comentario;
        $comentario->asunto = $request->asunto;
        $comentario->texto = $request->texto;
        $comentario->fecha_hora = now();
        $comentario->leido = 0;
        $comentario->users_id = $request->users_id;
        $comentario->articulo_id = $request->articulo_id;
        $comentario->save();

        //Redirigir a la url anterior
        return redirect()->back()->with('mensaje', 'Tu comentario se ha publicado correctamente!');
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
        $comentario = request()->except(['_token', '_method']);
        $data = request()->all();
        Comentario::where('id', '=', $id)->update($comentario);

        return redirect()->back()->with('mensaje', '¡El comentario se ha marcado como leído correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Comentario::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('mensaje', '¡El comentario se ha borrado correctamente!');
    }
}
