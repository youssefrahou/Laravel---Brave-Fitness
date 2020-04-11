<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicion extends Model
{
    protected $table = 'medicion';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
