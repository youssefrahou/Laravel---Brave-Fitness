<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    protected $table = 'mensaje';

    protected $fillable = ['texto', 'fecha', 'leido', 'de', 'para'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
}
