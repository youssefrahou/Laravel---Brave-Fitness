<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dia_semana extends Model
{
    //
    protected $table = 'dia_semana';


    public function alimentos()
    {
        return $this->hasMany('App\Alimento_dieta');
    }

    public function dietas()
    {
        return $this->belongsTo('App\Dieta');
    }
}
