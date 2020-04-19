<?php

namespace App\Http\Controllers;

use App\Consejo;
use Illuminate\Http\Request;

class ConsejoController extends Controller
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
        $request->validate([
            'titulo' => 'required:max:255',
            'texto' => 'required'
        ]);

        $consejo = $request->all();

        if ($request->file('foto')) {
            //obtenemos el campo file definido en el formulario
            $archivo = $request->file('foto');

            $path = public_path() . '/images/consejos';

            //obtenemos el nombre del archivo
            $nombre = $archivo->getClientOriginalName();

            $archivo->move($path, $nombre);

            $consejo['foto'] = $nombre;
        }
        $consejo['fecha'] = date("Y/m/d");

        Consejo::create($consejo);

        return redirect('admin')->with('mensaje', '¡El consejo se ha publicado correctamente!');
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
