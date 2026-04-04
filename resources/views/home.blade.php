<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Shop Laptop</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f5f5;
        }

        .navbar {
            background: #000;
        }

        .navbar a {
            color: white !important;
        }

        .banner {
            background: url('https://images.unsplash.com/photo-1517336714731-489689fd1ca8') no-repeat center;
            background-size: cover;
            height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }

        .banner h1 {
            background: rgba(0,0,0,0.6);
            padding: 10px 20px;
            border-radius: 10px;
        }

        .card {
            transition: 0.3s;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .price {
            color: red;
            font-weight: bold;
        }

        a.card-link {
            text-decoration: none;
            color: inherit;
        }
    </style>
</head>

<body>

<!-- MENU -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand text-white" href="/">💻 SHOP LAPTOP</a>

        <div>
            <a class="me-3" href="/">Trang chủ</a>
            <a class="me-3" href="/products">Sản phẩm</a>
            <a class="me-3" href="#">Giỏ hàng</a>
            <a href="#">Liên hệ</a>
        </div>
    </div>
</nav>

<!-- BANNER -->
<div class="banner">
    <h1>🔥 Laptop xịn - Giá sinh viên</h1>
</div>

<!-- SẢN PHẨM -->
<div class="container mt-5">

    <h3 class="mb-4">💥 Sản phẩm nổi bật</h3>

    <div class="row g-4">

        @foreach($products as $p)
        <div class="col-md-4">

            <!-- CLICK VÀO SẼ SANG DANH SÁCH -->
            <a href="/product/{{ $p->id }}" class="card-link">

                <div class="card shadow h-100">
                    <img src="{{ asset($p->image) }}" class="card-img-top">

                    <div class="card-body text-center">
                        <h5>{{ $p->name }}</h5>
                        <p class="price">{{ number_format($p->price) }}đ</p>
                        <button class="btn btn-primary">Xem thêm</button>
                    </div>
                </div>

            </a>

        </div>
        @endforeach

    </div>

    <!-- NÚT XEM TẤT CẢ -->
    <div class="text-center mt-4">
        <a href="/products" class="btn btn-dark px-4">Xem tất cả sản phẩm</a>
    </div>

</div>

<!-- FOOTER -->
<div class="text-center mt-5 p-3 bg-dark text-white">
    © 2026 Shop Laptop - vinvin
</div>

</body>
</html>