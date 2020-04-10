<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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


    public function articulos() 
    {
        return ('Esta es la pagina de todos los articulos');
    }

    public function articulosCategoria($categoria) 
    {
        return ('Esta es la pagina de todos los articulos de la CATEGORIA ' . $categoria);
    }

    public function planes() 
    {
        return  ('aqui la vista de planes');
    }

    public function sobreNosotros() 
    {
        return  ('aqui la vista de SOBRE NOSOTROS');
    }

    
}
