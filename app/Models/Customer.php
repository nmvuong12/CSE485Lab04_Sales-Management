<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    public $timestamps = false; // Tắt timestamps

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
