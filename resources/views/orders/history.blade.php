<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch sử mua hàng của {{ $customer->name }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Lịch sử mua hàng của khách hàng: {{ $customer->name }}</h2>
        
        @if($orders->isEmpty())
            <p>Khách hàng chưa có đơn hàng nào.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID Đơn hàng</th>
                        <th>Ngày đặt hàng</th>
                        <th>Sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        @foreach($order->order_details as $detail)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->order_date }}</td>
                                <td>{{ $detail->product->name }}</td>
                                <td>{{ $detail->quantity }}</td>
                                <td>
                                    @if($order->status == 0)
                                        Chưa xử lý
                                    @elseif($order->status == 1)
                                        Đang xử lý
                                    @elseif($order->status == 2)
                                        Hoàn thành
                                    @elseif($order->status == 3)
                                        Hủy
                                    @else
                                        Không xác định
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        @endif

        <a href="{{ route('orders.index') }}" class="btn btn-secondary">Quay lại danh sách đơn hàng</a>
    </div>
</body>
</html>
