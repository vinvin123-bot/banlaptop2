<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            display: flex;
        }

        .sidebar {
            width: 220px;
            height: 100vh;
            background: #343a40;
            color: white;
            position: fixed;
        }

        .sidebar a {
            display: block;
            color: white;
            padding: 15px;
            text-decoration: none;
        }

        .sidebar a:hover {
            background: #495057;
        }

        .content {
            margin-left: 220px;
            width: 100%;
            padding: 20px;
        }
    </style>
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <h4 class="text-center py-3">⚙️ ADMIN</h4>

    <a href="/admin/products">📦 Sản phẩm</a>
    <a href="#">🧾 Đơn hàng</a>
    <a href="#">👤 Người dùng</a>
    <a href="/">🏠 Trang chủ</a>
    <hr>

<form method="POST" action="/logout" class="px-3">
    @csrf
    <button class="btn btn-danger w-100">🚪 Đăng xuất</button>
</form>

<p class="text-center mt-3">
    👤 {{ Auth::user()->name }}
</p>
</div>

<!-- CONTENT -->
<div class="content">

    <h2 class="mb-4">Quản lý sản phẩm</h2>

    <a href="/admin/products/create" class="btn btn-success mb-3">+ Thêm sản phẩm</a>

    <table class="table table-bordered text-center">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Ảnh</th>
                <th>Tên</th>
                <th>Giá</th>
                <th>Hành động</th>
            </tr>
        </thead>

        <tbody>
            @foreach($products as $p)
            <tr>
                <td>{{ $p->id }}</td>
                <td><img src="{{ asset($p->image) }}" width="70"></td>
                <td>{{ $p->name }}</td>
                <td class="text-danger">{{ number_format($p->price) }}đ</td>
                <td>
                    <a href="/admin/products/{{ $p->id }}/edit" class="btn btn-warning btn-sm">Sửa</a>

                    <form action="/admin/products/{{ $p->id }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

</body>
</html>