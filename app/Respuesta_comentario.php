<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Respuesta_comentario extends Model
{
    protected $table = 'respuesta_comentario';


    public function comentario()
    {
        return $this->belongsTo('App\Comentario');
    }
}
