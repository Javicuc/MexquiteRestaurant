<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Table extends Model
{
    use softDeletes;

    const MESA_DISPONIBLE = 'mesa disponible';
    const MESA_RESERVADA = 'mesa reservada';

    protected $fillable = [
        'number',
        'price',
        'status',
        'size',
    ];

    public function setNumberAttribute($valor){
        $this->attributes['number'] = mb_strtolower($valor);
    }

    public function getNumberAttribute($valor){
        return ucwords($valor);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
