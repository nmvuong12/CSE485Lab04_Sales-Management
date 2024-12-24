<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa thông tin khách hàng</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Chỉnh sửa thông tin khách hàng</h2>
    <!-- Form chỉnh sửa thông tin độc giả -->
    <form action="{{route('customers.update',$customer->id)}}" method ="post">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="id">ID:</label>
            <input type="text" class="form-control" id="id" name="id" value="{{ $customer->id }}" disabled>
        </div>

        <div class="form-group">
            <label for="fullName">Họ Tên:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $customer->name }}">
        </div>



        <div class="form-group">
            <label for="address">Địa chỉ:</label>
            <input type="text" class="form-control" name="address" value="{{ $customer->address }}">
        </div>

        <div class="form-group">
            <label for="address">Email:</label>
            <input type="text" class="form-control" name="email" value="{{ $customer->email }}">
        </div>

        <div class="form-group">
            <label for="phone">Số điện thoại:</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ $customer->phone }}">
        </div>

        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
            <button type="button" class="btn btn-secondary" onclick="window.history.back();">Hủy bỏ</button>
        </div>
    </form>
</div>


</body>
</html>
