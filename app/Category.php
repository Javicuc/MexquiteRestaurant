<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use softDeletes;

    protected $fillable = [
      'name',
      'description',
      'icon',
    ];

    public function setNameAttribute($valor){
        $this->attributes['name'] = mb_strtolower($valor);
    }

    public function getNameAttribute($valor){
        return ucwords($valor);
    }
    
    public function dishes()
    {
      return $this->hasMany(Dish::class);
    }

    public function galleries()
    {
      return $this->hasMany(Gallery::class);
    }
}
