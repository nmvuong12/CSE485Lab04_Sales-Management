<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    use HasFactory;

    // Đảm bảo tên bảng là 'order_details' (tên bảng theo chuẩn Laravel)
    protected $table = 'order_details';
    
    // Các trường có thể gán hàng loạt
    protected $fillable = [
        'order_id',  // ID đơn hàng
        'product_id',  // ID sản phẩm
        'quantity',  // Số lượng sản phẩm
    ];

    // Quan hệ với bảng Order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Quan hệ với bảng Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
