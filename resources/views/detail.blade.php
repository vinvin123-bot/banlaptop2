<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chi tiết sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <a href="/" class="btn btn-secondary mb-3">⬅ Quay lại</a>

    <div class="row">
        
        <!-- ẢNH -->
        <div class="col-md-6">
            <img src="{{ asset($p->image) }}" class="img-fluid">
        </div>

        <!-- THÔNG TIN -->
        <div class="col-md-6">
            <h2>{{ $p->name }}</h2>

            <h4 class="text-danger">
                {{ number_format($p->price) }}đ
            </h4>

            <p class="mt-3">
                {{ $p->description }}
            </p>

            <button class="btn btn-success mt-3">
                🛒 Thêm vào giỏ
            </button>
        </div>

    </div>

</div>

</body>
</html>