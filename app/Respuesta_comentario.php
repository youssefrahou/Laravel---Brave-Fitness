<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Respuesta_comentario extends Model
{
    protected $table = 'respuesta_comentario';

    protected $fillable = ['texto', 'fecha_hora', 'leido', 'users_id', 'comentario_id'];


    public function comentario()
    {
        return $this->belongsTo('App\Comentario');
    }
}
