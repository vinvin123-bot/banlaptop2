<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chi tiết sản phẩm</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #0f172a;
            color: white;
        }

        /* NAVBAR */
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

        /* BOX */
        .product-box {
            background: #1e293b;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 0 20px rgba(124,58,237,0.3);
        }

        /* PRICE */
        .price {
            color: #22c55e;
            font-size: 24px;
            font-weight: bold;
        }

        /* BUTTON */
        .btn-buy {
            background: #7c3aed;
            border: none;
        }

        .btn-buy:hover {
            background: #6d28d9;
            box-shadow: 0 0 10px #7c3aed;
        }

        /* TABLE */
        .table {
            color: white;
        }

        .table td {
            background: #020617;
        }

        /* ALERT */
        .alert {
            border-radius: 10px;
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

    {{-- THÔNG BÁO --}}
    @if(session('success'))
        <div class="alert alert-success text-center shadow">
            ✅ {{ session('success') }}
        </div>
    @endif

    <a href="/" class="btn btn-secondary mb-3">⬅ Quay lại</a>

    <div class="row product-box">

        <!-- ẢNH -->
        <div class="col-md-5">
            <img src="{{ asset($p->image) }}" class="img-fluid rounded">
        </div>

        <!-- THÔNG TIN -->
        <div class="col-md-7">

            <h2>{{ $p->name }}</h2>

            <p class="price">
                {{ number_format($p->price) }}đ
            </p>

            <p>{{ $p->description }}</p>

            <!-- NÚT GIỎ HÀNG -->
            <a href="/add-to-cart/{{ $p->id }}" class="btn btn-buy mt-2">
                🛒 Thêm vào giỏ
            </a>

            <hr>

            <h4>📊 Thông số kỹ thuật</h4>

            <table class="table table-bordered">

                <tr>
                    <td>CPU</td>
                    <td>{{ $p->cpu ?? 'Intel Core i5' }}</td>
                </tr>

                <tr>
                    <td>RAM</td>
                    <td>{{ $p->ram ?? '8GB' }}</td>
                </tr>

                <tr>
                    <td>Ổ cứng</td>
                    <td>{{ $p->storage ?? '512GB SSD' }}</td>
                </tr>

                <tr>
                    <td>GPU</td>
                    <td>{{ $p->gpu ?? 'RTX 3050' }}</td>
                </tr>

                <tr>
                    <td>Màn hình</td>
                    <td>{{ $p->screen ?? '15.6 inch FHD' }}</td>
                </tr>

                <tr>
                    <td>Hệ điều hành</td>
                    <td>{{ $p->os ?? 'Windows 11' }}</td>
                </tr>

                <tr>
                    <td>Pin</td>
                    <td>{{ $p->battery ?? '4-6 giờ' }}</td>
                </tr>

                <tr>
                    <td>Trọng lượng</td>
                    <td>{{ $p->weight ?? '1.8kg' }}</td>
                </tr>

            </table>

        </div>

    </div>

</div>

<!-- FOOTER -->
<div class="text-center mt-5 p-3" style="background:#020617; border-top:1px solid #7c3aed;">
    © 2026 Gaming Shop 🔥
</div>

</body>
</html>