<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesion extends Model
{
    protected $table = 'lesion';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
