<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function index()
    {
        // Sử dụng paginate thay vì get để phân trang dữ liệu
        $orders = Order::with('order_details.product', 'customer')->paginate(10);

        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $customers = Customer::all();
        $products = Product::all();
        return view('orders.create', compact('customers', 'products'));
    }


    public function store(Request $request)
    {
        // Tạo mới đơn hàng
        $order = new Order();
        $order->customer_id = $request->input('customer_id');
        
        // Thiết lập trạng thái cho đơn hàng
        $status = $request->input('status');
        switch ($status) {
            case 'Pending':
                $order->status = 0;
                break;
            case 'Processing':
                $order->status = 1;
                break;
            case 'Completed':
                $order->status = 2;
                break;
            case 'Cancelled':
                $order->status = 3;
                break;
            default:
                $order->status = 0; // Mặc định là Pending
        }
    
        // Cập nhật giá trị cho order_date (nếu chưa có)
        $order->order_date = Carbon::now();  // Gán ngày hiện tại
    
        // Lưu đơn hàng
        $order->save();
    
        return redirect()->route('orders.index')->with('success', 'Đơn hàng đã được thêm thành công.');
    }
    

    public function updateStatus(Request $request, $id)
    {
        // Tìm đơn hàng theo ID
        $order = Order::find($id);

        // Nếu không tìm thấy đơn hàng
        if (!$order) {
            return redirect()->route('orders.index')->with('error', 'Đơn hàng không tồn tại.');
        }

        // Cập nhật trạng thái của đơn hàng
        $order->status = $request->status;
        $order->save();

        // Quay lại trang danh sách đơn hàng
        return redirect()->route('orders.index')->with('success', 'Cập nhật trạng thái đơn hàng thành công.');
    }

    
    public function showHistory(Customer $customer)
    {
        // Lấy tất cả các đơn hàng của khách hàng
        $orders = Order::where('customer_id', $customer->id)->with('order_details')->get();
        
        // Trả về view với dữ liệu đơn hàng
        return view('orders.history', compact('orders', 'customer'));
    }

}
