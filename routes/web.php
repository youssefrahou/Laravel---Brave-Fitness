<?php

use Illuminate\Support\Facades\Route;
use App\User;
use App\Comentario;
use App\Charts\pesoUsuario;

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

Route::get('articulo/{id}', function ($id) {

    $articulo = App\Articulo::find($id);
    $comentarios = App\Comentario::where('articulo_id', $id)->get();

    return view('articulo', compact('articulo', 'comentarios'));
});

Route::get('prueba2', function () {
    return view('prueba');
});


Route::get('areaPersonal', function () {



    // ...

    // Instanciamos el objeto gráfico 
    $chart = new pesoUsuario();

    // Añadimos las etiquetas del eje X
    $chart->labels(['One', 'Two', 'Three']);
    $chart->dataset('My dataset 1', 'line', [1, 2, 3, 4]);
    $chart->dataset('My dataset 2', 'line', collect([3, 4, 5, 6]));


    return view('areaPersonal', compact('chart'));
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




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
