<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Order;
use App\Models\Order_detail;

class OrderController extends Controller
{
    //
    public function index()
    {
        $order = Order::with(['customers', 'products', 'order_details'])->paginate(5);
        return view('orders.index', compact('order'));

    }
}
