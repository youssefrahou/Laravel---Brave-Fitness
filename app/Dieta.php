<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dieta extends Model
{
    protected $table = 'dieta';

    public function dias_semana()
    {
        return $this->hasMany('App\Dia_semana');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
