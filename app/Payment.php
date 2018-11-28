<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use softDeletes;

    protected $fillable = [
    	'name',
    	'details',
    ];

    public function reservations()
    {
    	return $this->hasMany(Reservation::class);
    }
}
