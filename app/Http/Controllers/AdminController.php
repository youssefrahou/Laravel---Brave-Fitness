<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Categoria;
use App\Articulo;
use App\Consejo;
use App\Comentario;
use DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function inicio(Request $request)
    {

        $request->user()->authorizeRoles(['admin']);

        $usuarios = User::all();
        $totalUsuarios = DB::table('users')->count();
        $totalArticulos = DB::table('articulo')->count();
        $totalConsejos = DB::table('consejo')->count();
        $totalComentarios = DB::table('comentario')->count();
        $totalMensajes = DB::table('mensaje')->count();
        $categorias = Categoria::all();
        $articulos = Articulo::all();
        $consejos = Consejo::all()->sortByDesc("created_at");
        $comentarios = Comentario::all()->sortByDesc("created_at");

        return view('admin', compact('usuarios', 'totalUsuarios', 'totalArticulos', 'totalConsejos', 'totalComentarios', 
        'totalMensajes', 'categorias', 'articulos', 'consejos', 'comentarios'));

    }
}
