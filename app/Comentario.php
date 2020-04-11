<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    
    protected $table = 'comentario';

    public function respuestas()
    {
        return $this->hasMany('App\Respuesta_comentario');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function articulo()
    {
        return $this->belongsTo('App\Articulo');
    }
}
