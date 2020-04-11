<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Intolerancia extends Model
{
    protected $table = 'intolerancia';

    public function users()
    {
        return $this->belongsToMany('App\User', 'intolerancia_usuario');
    }
}
