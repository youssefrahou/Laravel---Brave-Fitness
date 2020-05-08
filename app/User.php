<?php

namespace App;

use App\Role;
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
        'name', 'apellido1', 'apellido2', 'objetivo', 'sexo', 'peso', 'altura', 'fechaNacimiento', 'email', 'password',
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

    //roles
    public function authorizeRoles($roles)
    {
        abort_unless($this->hasAnyRole($roles), 401);
        return true;
    }

    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                 return true; 
            }   
        }
        return false;
    }
    
    public function hasRole($role)
    {
        if ($this->roles()->where('nombre', $role)->first()) {
            return true;
        }
        return false;
    }


    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    // fin roles

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

    public function intolerancias()
    {
        return $this->belongsToMany('App\Intolerancia', 'intolerancia_usuario');
    }



}
