<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use softDeletes;

    protected $fillable = [
      'name',
      'phone',
      'email',
    ];

    public function setNameAttribute($valor){
        $this->attributes['name'] = mb_strtolower($valor);
    }

    public function getNameAttribute($valor){
        return ucwords($valor);
    }
    
    public function reservations()
    {
    	return $this->hasMany(Reservation::class);
    }
}
