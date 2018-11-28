<?php

namespace App;

use App\Gallery;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use softDeletes;

    protected $fillable = [
      'name',
      'uri',
    ];

    public function galleries()
    {
    	return $this->belongsToMany(Gallery::class);
    }
}
