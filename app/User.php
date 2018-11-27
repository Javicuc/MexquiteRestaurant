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

    const USUARIO_VERIFICADO = 'verificado';
    const USUARIO_NO_VERIFICADO = 'no verificado';

    const USUARIO_REGULAR = '0';
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
        'verified',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function generarVerificationToken()
    {
      return str_random(40);
    }

    public function esSuper()
    {
        return $this->type == User::USUARIO_SUPER;
    }

    public function esRegular()
    {
        return $this->type == User::USUARIO_REGULAR;
    }

    public function esAdministrador()
    {
        return $this->type == User::USUARIO_ADMINISTRADOR;
    }
}
