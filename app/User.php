<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function mensajes()
    {
        return $this->hasMany('App\Mensaje');
    }

    public function mediciones()
    {
        return $this->hasMany('App\Medicion');
    }

    public function deportes_practicados()
    {
        return $this->hasMany('App\Deporte_practicado');
    }

    public function videos()
    {
        return $this->hasMany('App\Video');
    }

    public function lesiones()
    {
        return $this->hasMany('App\Lesion');
    }

    public function consejos()
    {
        return $this->hasMany('App\Consejo');
    }

    public function articulos()
    {
        return $this->hasMany('App\Articulo');
    }

    public function comentarios()
    {
        return $this->hasMany('App\Comentario');
    }

    public function dietas()
    {
        return $this->hasMany('App\Dieta');
    }


}
