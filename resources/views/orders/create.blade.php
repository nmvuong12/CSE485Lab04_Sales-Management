<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Đơn Hàng</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>Thêm Đơn Hàng</h1>

        <form action="{{ route('orders.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="customer_id" class="form-label">Khách hàng</label>
                <select name="customer_id" id="customer_id" class="form-control" required>
                    <option value="">-- Chọn khách hàng --</option>
                    @foreach($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="product_id" class="form-label">Sản phẩm</label>
                <select name="product_id" id="product_id" class="form-control" required>
                    <option value="">-- Chọn sản phẩm --</option>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="order_date" class="form-label">Ngày đặt hàng</label>
                <input type="date" name="order_date" id="order_date" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="quantity" class="form-label">Số lượng</label>
                <input type="number" name="quantity" id="quantity" class="form-control" required>
            </div>

            <div class="mb-3">
        <label for="status" class="form-label">Trạng thái</label>
        <select name="status" id="status" class="form-control" required>
            <!-- Sử dụng giá trị số cho trạng thái -->
            <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Chưa xử lý</option>
            <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Đang xử lý</option>
            <option value="2" {{ old('status') == 2 ? 'selected' : '' }}>Hoàn thành</option>
        </select>
    </div>

            <button type="submit" class="btn btn-primary">Thêm</button>
            <a href="{{ route('orders.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
</body>
</html>
