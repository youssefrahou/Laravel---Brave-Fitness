<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tag';

    public function articulos()
    {
        return $this->belongsTo('App\Articulo');
    }
}
