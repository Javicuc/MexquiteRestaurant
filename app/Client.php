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

    public function reservations()
    {
    	return $this->hasMany(Reservation::class);
    }
}
