<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articulo;

class PaginasController extends Controller
{

    
    public function inicio()
    {
        return view ('inicio');
    }

    public function login()
    {
        return view ('login');
    }

    public function articulos(){

        $articulos = Articulo::all()->sortByDesc("created_at");

        return view('articulos', compact('articulos'));
    }


    public function articulosCategoria($categoria) 
    {
        return ('Esta es la pagina de todos los articulos de la CATEGORIA ' . $categoria);
    }

    public function planes() 
    {
        return  view('planes');
    }

    public function sobreNosotros() 
    {
        return  view('sobreNosotros');
    }

    
}
