<?php

namespace App;

use App\Category;
use App\Dish;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use softDeletes;

    protected $fillable = [
    	'name',
    	'description',
    	'category_id',
    ];

    public function setNameAttribute($valor){
        $this->attributes['name'] = mb_strtolower($valor);
    }

    public function getNameAttribute($valor){
        return ucwords($valor);
    }
    
    public function dish()
    {
        return $this->hasOne(Dish::class);
    }

    public function images()
    {
    	return $this->belongsToMany(Image::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
