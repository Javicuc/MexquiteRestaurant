<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Table extends Model
{
    use softDeletes;

    const MESA_DISPONIBLE = 'mesa disponible';
    const MESA_OCUPADA = 'mesa ocupada'; // Solo dura 5 minutos en este estado
    const MESA_RESERVADA = 'mesa reservada';

    protected $fillable = [
        'number',
        'price',
        'status',
        'size',
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
