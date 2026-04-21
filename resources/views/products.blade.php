<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Tất cả sản phẩm</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #0f172a;
            color: white;
        }

        .navbar {
            background: #020617;
            border-bottom: 2px solid #7c3aed;
        }

        .navbar a {
            color: #e5e7eb !important;
        }

        .navbar a:hover {
            color: #7c3aed !important;
        }

        .card {
            background: #1e293b;
            border-radius: 15px;
            transition: 0.3s;
            border: 1px solid transparent;
        }

        .card:hover {
            transform: translateY(-10px);
            border: 1px solid #7c3aed;
            box-shadow: 0 0 20px #7c3aed;
        }

        .price {
            color: #22c55e;
            font-weight: bold;
        }

        .btn-primary {
            background: #7c3aed;
            border: none;
        }

        .btn-primary:hover {
            background: #6d28d9;
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
        <a class="navbar-brand text-white" href="/">⚡ MIXI SHOP</a>

        <div>
            <a class="me-3" href="/">Trang chủ</a>
            <a class="me-3" href="/products">Sản phẩm</a>
            <a class="me-3" href="/cart">Giỏ hàng</a>
        </div>
    </div>
</nav>

<div class="container mt-5">

    <h3 class="mb-4 text-center">💻 TẤT CẢ SẢN PHẨM</h3>

    <div class="row g-4">

        @foreach($products as $p)
        <div class="col-md-4">

            <a href="/product/{{ $p->id }}" class="card-link">

                <div class="card h-100">
                    <img src="{{ asset($p->image) }}" class="card-img-top">

                    <div class="card-body text-center">
                        <h5>{{ $p->name }}</h5>
                        <p class="price">{{ number_format($p->price) }}đ</p>

                        <button class="btn btn-primary mt-2">
                            Xem chi tiết
                        </button>
                    </div>
                </div>

            </a>

        </div>
        @endforeach

    </div>

</div>

<!-- FOOTER -->
<div class="text-center mt-5 p-3" style="background:#020617; border-top:1px solid #7c3aed;">
    © 2026 Gaming Shop 🔥
</div>

</body>
</html>