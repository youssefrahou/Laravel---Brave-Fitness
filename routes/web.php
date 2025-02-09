<?php

use Illuminate\Support\Facades\Route;
use App\User;
use App\Comentario;
use App\Charts\pesoUsuario;
use App\Medicion;
use App\Consejo;
use App\Categoria;
use App\Articulo;
use App\Mensaje;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PaginasController@inicio');
Route::get('articulos', 'PaginasController@articulos');
Route::get('articulos/{categoria}', 'PaginasController@articulosCategoria');
Route::get('planes', 'PaginasController@planes');
Route::get('sobreNosotros', 'PaginasController@sobreNosotros');
Route::get('admin', 'AdminController@inicio');
Route::get('/login2', 'PaginasController@login');
Route::get('/articulos', 'PaginasController@articulos');
Route::get('/usuarios', function () {

    $articulo = App\Articulo::find(1);

    return $articulo;
    /*
    foreach($articulo->tags as $tag){
        echo $tag->nombre . '<br/>';
    }*/
});


Route::get('mensajes/{id}', function ($id) {

    $mensajes = DB::select("select * from mensaje where mensaje.de = ? or mensaje.para = ? order by mensaje.fecha asc", [$id, $id]);
    return json_encode($mensajes);
});

//EJEMPLO MIDDLEWARE
Route::get('usuarios', function () {

    if (Auth::user()->hasRole('admin')) {
        $usuarios = DB::select("select * from users");
        return json_encode($usuarios);
    }
})->middleware('auth');;
//EJEMPLO MIDDLEWARE


Route::get('usuarios/{id}', function ($id) {

    $usuario = DB::select("select * from users where id = ?", [$id]);
    return json_encode($usuario);
});

Route::get('usuario/{id}', function ($id) {

    $usuario = User::find($id);
    return json_encode($usuario);
});


Route::get('articulo/{id}', function ($id) {

    $articulo = App\Articulo::find($id);
    $comentarios = App\Comentario::where('articulo_id', $id)->get();

    return view('articulo', compact('articulo', 'comentarios'));
});

Route::get('prueba2', function () {
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

    return view('prueba', compact(
        'usuarios',
        'totalUsuarios',
        'totalArticulos',
        'totalConsejos',
        'totalComentarios',
        'totalMensajes',
        'categorias',
        'articulos',
        'consejos',
        'comentarios'
    ));
});


Route::get('areaPersonal', function () {

    $usuarios = User::all();
    $mediciones = Medicion::all();

    $medFechas = Medicion::select('fecha')->where('users_id', auth()->user()->id)->get();
    $medPeso = Medicion::select('peso')->where('users_id', auth()->user()->id)->get();

    $fechas = array();
    foreach ($medFechas as $medicion) {

        array_push($fechas, $medicion['fecha']);
    }

    $pesos = array();
    foreach ($medPeso as $peso) {

        array_push($pesos, $peso['peso']);
    }




    // Instanciamos el objeto gráfico 
    $chart = new pesoUsuario();

    $chart->title('Progreso', 30, "rgb(0, 0, 0)", 'Helvetica Neue');

    //quito el true arriba para q no me moleste esta mierda de IDE, puede q falle algo xd
    // $chart->title('Progreso', 30, "rgb(0, 0, 0)", true, 'Helvetica Neue');

    $chart->barwidth(0.0);
    $chart->displaylegend(false);



    // Añadimos las etiquetas del eje X
    $chart->labels($fechas);

    $chart->dataset('Peso', 'line', $pesos)
        ->color("rgb(20, 166, 192)")
        ->backgroundcolor("rgb(255, 255, 255)")
        ->fill(false)
        ->linetension(0.1)
        ->dashed([0]);


    return view('areaPersonal', compact('chart', 'usuarios', 'mediciones'));
});

/**
 * RUTAS CRUD
 */

Route::resource('user', 'UsersController');
Route::resource('mensaje', 'MensajeController');
Route::resource('medicion', 'MedicionController');
Route::resource('deportePracticado', 'Deporte_practicadoController');
Route::resource('categoria', 'CategoriaController');
Route::resource('video', 'VideoController');
Route::resource('lesion', 'LesionController');
Route::resource('intolerancia', 'IntoleranciaController');
Route::resource('consejo', 'ConsejoController');
Route::resource('dieta', 'DietaController');
Route::resource('diaSemana', 'Dia_semanaController');
Route::resource('alimentoDieta', 'Alimento_dietaController');
Route::resource('articulo', 'ArticuloController');
Route::resource('comentario', 'ComentarioController');
Route::resource('respuesta', 'Respuesta_comentarioController');
/**
 * fin RUTAS CRUD
 */

/**
 * Rutas para chat
 */
//Route::get('/', 'ChatController@index');
Route::get('messages', 'ChatController@fetchMessages');
Route::post('messages', 'ChatController@sendMessage');
/**
 * Rutas para chat
 */




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
