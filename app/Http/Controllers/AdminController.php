<?php

namespace App\Http\Controllers;

use App\Articulo;
use Illuminate\Http\Request;
use App\User;
use App\Categoria;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function inicio () 
    {

        $usuarios = User::all();
        $categorias = Categoria::all();

        return view('admin', compact('usuarios', 'categorias'));
    }
}
