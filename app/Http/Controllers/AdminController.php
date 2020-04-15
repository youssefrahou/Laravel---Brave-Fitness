<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Categoria;
use DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function inicio()
    {
        $usuarios = User::all();
        $totalUsuarios = DB::table('users')->count();
        $totalArticulos = DB::table('articulo')->count();
        $totalConsejos = DB::table('consejo')->count();
        $totalComentarios = DB::table('comentario')->count();
        $totalMensajes = DB::table('mensaje')->count();
        $categorias = Categoria::all();

        return view('plantillas.admin', compact('usuarios', 'totalUsuarios', 'totalArticulos', 'totalConsejos', 'totalComentarios', 'totalMensajes', 'categorias'));

    }
}
