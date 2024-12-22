<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public $timestamps = false; // Tắt timestamps

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_details');
    }
}
