<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    public function order_details()
    {
        return $this->hasMany(Order_detail::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_details');
    }

    public function customers()
    {
        return $this->belongsToMany(Customer::class);
    }
}
