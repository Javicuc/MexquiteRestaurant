<?php

namespace App;

use App\Client;
use App\Dish;
use App\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    use softDeletes;

    protected $fillable = [
    	'date',
    	'hour',
    	'clients_quantity',
    	'occasion',
    	'client_id',
    	'table_id',
    	'payment_id',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function table()
    {
        return $this->belongsTo(Table::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function dishes()
    {
        return $this->belongsToMany(Dish::class);
    }
}
