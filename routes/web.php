<?php

use Illuminate\Support\Facades\Route;
use App\User;

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
Route::get('/usuarios', function(){
    return App\Mensaje::where('users_id', 2)->get();
});





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
