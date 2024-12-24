<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Quản lý Đơn hàng</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Quản lý <b>Đơn hàng</b></h2>
                    </div>
                </div>
            </div>

            <!-- Nút Thêm Đơn Hàng nằm ngay dưới tiêu đề -->
            <div class="row mt-4">
                <div class="col-sm-6">
                    <a href="{{ route('orders.create') }}" class="btn btn-success">
                        <i class="material-icons">&#xE147;</i> <span>Thêm đơn hàng</span>
                    </a>
                </div>
            </div>

            <table class="table table-striped table-hover mt-4">
                <thead>
                    <tr>
                        <th>ID đơn hàng</th>
                        <th>Khách hàng</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Ngày đặt hàng</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        @foreach ($order->order_details as $detail)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td><a href="{{ route('orders.history', $order->customer->id) }}">{{ $order->customer->name }}</a></td>
                                <td>{{ $detail->product->name }}</td>
                                <td>{{ $detail->quantity }}</td>
                                <td>{{ $order->order_date }}</td>
                                <td>{{ $order->status == 0 ? 'Chưa xử lý' : ($order->status == 1 ? 'Đang xử lý' : ($order->status == 2 ? 'Hoàn thành' : 'Hủy')) }}</td>
                                <td>
                                    <a href="#updateStatusModal{{ $order->id }}" class="edit" data-toggle="modal">
                                        <i class="material-icons" data-toggle="tooltip" title="Cập nhật trạng thái">edit</i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-center">
                {{ $orders->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>        
</div>

<!-- Modals Cập Nhật Trạng Thái -->
@foreach ($orders as $order)
<div id="updateStatusModal{{ $order->id }}" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('orders.updateStatus', $order->id) }}" method="POST">
                @csrf
                <div class="modal-header">						
                    <h4 class="modal-title">Cập nhật trạng thái đơn hàng</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="status">Trạng thái</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="0" {{ $order->status == 0 ? 'selected' : '' }}>Chưa xử lý</option>
                            <option value="1" {{ $order->status == 1 ? 'selected' : '' }}>Đang xử lý</option>
                            <option value="2" {{ $order->status == 2 ? 'selected' : '' }}>Hoàn thành</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
</body>
</html>
