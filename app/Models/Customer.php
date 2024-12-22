<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    public $timestamps = false; // Tắt timestamps

    protected $fillable = ['name', 'address', 'phone', 'email'];
    
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
