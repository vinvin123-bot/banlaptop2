<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">
    <h2 class="mb-4">🛒 Tất cả sản phẩm</h2>

    <div class="row">
        @foreach($products as $p)
        <div class="col-md-3 mb-4">
            <div class="card h-100">
                <img src="{{ asset($p->image) }}" class="card-img-top" height="200">

                <div class="card-body text-center">
                    <h5>{{ $p->name }}</h5>
                    <p class="text-danger">{{ number_format($p->price) }}đ</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>

</body>
</html>