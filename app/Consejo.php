<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consejo extends Model
{
    protected $table = 'consejo';

    

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
