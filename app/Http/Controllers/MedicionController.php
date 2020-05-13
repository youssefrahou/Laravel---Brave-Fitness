<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medicion;

class MedicionController extends Controller
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
        $medicion = new Medicion();
        $medicion = request()->all();
        
        $medicion['fecha'] = now();

        

        if ($request->file('foto_delante')) {

            //obtenemos el campo file definido en el formulario
            $archivo = $request->file('foto_delante');

            $path = public_path() . '/images/mediciones' . $request->users_id;

            //obtenemos el nombre del archivo
            $nombre = $archivo->getClientOriginalName();

            $archivo->move($path, $nombre);

            $medicion['foto_delante'] = $nombre;
        }

        if ($request->file('foto_lado')) {

            //obtenemos el campo file definido en el formulario
            $archivo = $request->file('foto_lado');

            $path = public_path() . '/images/mediciones/' . $request->users_id;

            //obtenemos el nombre del archivo
            $nombre = $archivo->getClientOriginalName();

            $archivo->move($path, $nombre);

            $medicion['foto_lado'] = $nombre;
        }

        if ($request->file('foto_atras')) {

            //obtenemos el campo file definido en el formulario
            $archivo = $request->file('foto_atras');

            $path = public_path() . '/images/mediciones' . $request->users_id;

            //obtenemos el nombre del archivo
            $nombre = $archivo->getClientOriginalName();

            $archivo->move($path, $nombre);

            $medicion['foto_atras'] = $nombre;
        }



        Medicion::create($medicion);



        return redirect()->back()->with('mensaje', '¡Tu medición se ha añadido correctamente!');
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
