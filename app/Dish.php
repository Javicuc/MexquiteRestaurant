<?php

namespace App;

use App\Category;
use App\Gallery;
use App\Reservation;
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

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function reservations()
    {
        return $this->belongsToMany(Reservation::class);
    }
}
