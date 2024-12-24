<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
        crossorigin="anonymous">
    <title>Cập nhật thông tin sản phẩm</title>
</head>
<body>

<h1 style="margin: 50px 50px">Cập nhật thông tin sản phẩm</h1>

<form action="{{ route('products.update', $product->id) }}" method="POST" style="margin: 50px 50px">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Tên sản phẩm</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
    </div>

    <div class="form-group mt-3">
        <label for="description">Mô tả</label>
        <textarea class="form-control" id="description" name="description" required>{{ $product->description }}</textarea>
    </div>

    <div class="form-group mt-3">
        <label for="price">Giá</label>
        <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
    </div>

    <div class="form-group mt-3">
        <label for="quantity">Số lượng</label>
        <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $product->quantity }}" required>
    </div>
    
    <button type="submit" class="btn btn-primary">Cập nhật</button>
</form>

</body>
</html>
