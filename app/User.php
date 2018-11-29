<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    protected $table = 'users';
    protected $dates = ['deleted_at'];

    const USUARIO_SUPER = '1';
    const USUARIO_ADMINISTRADOR = '2';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'email', 
        'password',
        'photo',
        'type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setNameAttribute($valor){
        $this->attributes['name'] = mb_strtolower($valor);
    }

    public function getNameAttribute($valor){
        return ucwords($valor);
    }

    public function esSuper()
    {
        return $this->type == User::USUARIO_SUPER;
    }

    public function esAdministrador()
    {
        return $this->type == User::USUARIO_ADMINISTRADOR;
    }
}
