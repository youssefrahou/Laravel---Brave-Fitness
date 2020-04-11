<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'video';


    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
