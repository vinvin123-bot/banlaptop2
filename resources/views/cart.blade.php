<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Giỏ hàng</title>

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

        .cart-box {
            background: #1e293b;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(124,58,237,0.3);
        }

        .table {
            color: white;
        }

        .table td {
            background: #020617;
        }

        .price {
            color: #22c55e;
            font-weight: bold;
        }

        .btn-buy {
            background: #7c3aed;
            border: none;
        }

        .btn-buy:hover {
            background: #6d28d9;
            box-shadow: 0 0 10px #7c3aed;
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

    <div class="cart-box">

        <h3 class="mb-4">🛒 Giỏ hàng của bạn</h3>

        @php $total = 0; @endphp

        @if(session('cart') && count(session('cart')) > 0)

        <table class="table table-bordered text-center align-middle">

            <tr>
                <th>Tên</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Tổng</th>
            </tr>

            @foreach(session('cart') as $id => $item)

            <tr>
                <td>{{ $item['name'] }}</td>
                <td>{{ $item['quantity'] }}</td>
                <td class="price">{{ number_format($item['price']) }}đ</td>
                <td class="price">
                    {{ number_format($item['price'] * $item['quantity']) }}đ
                </td>
            </tr>

            @php $total += $item['price'] * $item['quantity']; @endphp

            @endforeach

        </table>

        <h4 class="text-end mt-3">
            Tổng: <span class="price">{{ number_format($total) }}đ</span>
        </h4>

        <div class="text-end mt-3">
            <a href="/checkout" class="btn btn-buy px-4">
                💳 Đặt hàng
            </a>
        </div>

        @else

        <p>❌ Giỏ hàng trống</p>

        @endif

    </div>

</div>

<!-- FOOTER -->
<div class="text-center mt-5 p-3" style="background:#020617; border-top:1px solid #7c3aed;">
    © 2026 Gaming Shop 🔥
</div>

</body>
</html>