<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Table extends Model
{
    use softDeletes;

    public const MESA_DISPONIBLE = 'mesa disponible';
    public const MESA_OCUPADA = 'mesa ocupada'; // Solo dura 5 minutos en este estado
    public const MESA_RESERVADA = 'mesa reservada';

    protected $fillable = [
      'number',
      'price',
      'status',
      'size',
    ];
}
