<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicion extends Model
{
    protected $table = 'medicion';

    protected $fillable = [
        'fecha', 'peso', 'altura', 'foto_delante', 'foto_lado', 'foto_atras', 'users_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
