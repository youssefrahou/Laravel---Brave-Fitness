<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    //
    protected $table = 'articulo';

    public function comentarios()
    {
        return $this->hasMany('App\Comentario');
    }

    /*public function tags()
    {
        return $this->hasMany('App\Tags');
    }*/

    public function categoria()
    {
        return $this->belongsTo('App\Categoria');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'articulo_tags');
    }




}
