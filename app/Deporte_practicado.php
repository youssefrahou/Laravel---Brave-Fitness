<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deporte_practicado extends Model
{
    protected $table = 'deporte_practicado';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
