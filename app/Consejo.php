<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consejo extends Model
{
    protected $table = 'consejo';

    protected $fillable = ['titulo', 'texto', 'fecha', 'foto', 'users_id'];


    

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
