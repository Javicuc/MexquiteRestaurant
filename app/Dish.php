<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dish extends Model
{
    use softDeletes;

    const PLATILLO_DISPONIBLE = 'platillo disponible';
    const PLATILLO_NO_DISPONIBLE = 'platillo no disponible';

    protected $fillable = [
    	'name',
    	'price',
    	'description',
    	'status',
    	'gallery_id',
    	'category_id',
    ];
}
