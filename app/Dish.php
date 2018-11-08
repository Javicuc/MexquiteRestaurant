<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dish extends Model
{
    use softDeletes;

    public const PLATILLO_DISPONIBLE = 'platillo disponible';
    public const PLATILLO_NO_DISPONIBLE = 'platillo no disponible';
}
