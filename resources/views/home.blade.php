<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Gaming Laptop Shop</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font đẹp -->
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">

    <style>
        body {
            background: #0f172a;
            color: white;
            font-family: 'Orbitron', sans-serif;
        }

        /* NAVBAR */
        .navbar {
    background: linear-gradient(90deg, #020617, #0f172a);
    border-bottom: 1px solid #7c3aed;
}

.navbar .nav-link {
    color: #e5e7eb;
    margin: 0 10px;
    transition: 0.3s;
}

.navbar .nav-link:hover {
    color: #7c3aed;
    text-shadow: 0 0 8px #7c3aed;
}

/* SEARCH */
.search-box {
    background: #020617;
    border-radius: 8px;
    overflow: hidden;
}

.search-input {
    border: none;
    background: transparent;
    color: white;
}

.search-input:focus {
    box-shadow: none;
}

.search-btn {
    background: #7c3aed;
    color: white;
    border: none;
    padding: 5px 15px;
}

.search-btn:hover {
    background: #6d28d9;
}
        /* BANNER */
        .banner {
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)),
            url('https://images.unsplash.com/photo-1517336714731-489689fd1ca8');
            background-size: cover;
            height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .banner h1 {
            color: #7c3aed;
            text-shadow: 0 0 20px #7c3aed;
        }

        /* CARD */
        .card {
            background: #1e293b;
            border-radius: 15px;
            overflow: hidden;
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

        /* BUTTON */
        .btn-primary {
            background: #7c3aed;
            border: none;
        }

        .btn-primary:hover {
            background: #6d28d9;
            box-shadow: 0 0 10px #7c3aed;
        }

        /* LINK CARD */
        a.card-link {
            text-decoration: none;
            color: inherit;
        }

        /* FOOTER */
        footer {
            background: #020617;
            border-top: 1px solid #7c3aed;
        }

.alert-success {
    background: linear-gradient(90deg, #22c55e, #16a34a);
    color: white;
    border: none;
    font-weight: bold;
}
    </style>
</head>

<body>

<!-- MENU -->
<nav class="navbar navbar-expand-lg px-4">
    <div class="container-fluid">

        <!-- LOGO -->
        <a class="navbar-brand fw-bold text-white" href="/">
            ⚡ MIXI SHOP
        </a>

        <!-- MENU -->
        <div class="collapse navbar-collapse justify-content-end">

            <ul class="navbar-nav align-items-center">

                <li class="nav-item">
                    <a class="nav-link" href="/">Trang chủ</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/products">Sản phẩm</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/cart">Giỏ hàng</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Liên hệ</a>
                </li>

                <!-- SEARCH -->
                <li class="nav-item ms-3">
                    <form action="/products" method="GET" class="d-flex search-box">
                        <input 
                            type="text" 
                            name="keyword"
                            value="{{ request('keyword') }}"
                            placeholder="🔍 Tìm laptop..."
                            class="form-control search-input"
                        >
                        <button class="btn search-btn">Tìm</button>
                    </form>
                </li>

            </ul>

        </div>

    </div>
</nav>
<!-- BANNER -->
<div class="banner">
    <h1>🔥 LAPTOP GAMING - VĂN PHÒNG - MACBOOK 🔥</h1>
</div>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Đặt hàng thành công!',
        text: 'Cảm ơn bạn đã mua hàng ❤️',
        confirmButtonColor: '#7c3aed'
    });
</script>
@endif

<!-- SẢN PHẨM -->
<div class="container mt-5">

    <h3 class="mb-4 text-center">💻 SẢN PHẨM NỔI BẬT</h3>

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
<footer class="text-center mt-5 p-3">
    © 2026 Gaming Shop - vinvin 🔥
</footer>

</body>
</html>