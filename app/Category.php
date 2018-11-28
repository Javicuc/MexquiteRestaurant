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

    public function dishes()
    {
      return $this->hasMany(Dish::class);
    }

    public function galleries()
    {
      return $this->hasMany(Gallery::class);
    }
}
