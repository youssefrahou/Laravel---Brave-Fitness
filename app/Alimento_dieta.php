<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alimento_dieta extends Model
{
    protected $table = 'alimento_dieta';

    
    public function dia_semana()
    {
        return $this->belongsTo('App\Dia_semana');
    }


}
