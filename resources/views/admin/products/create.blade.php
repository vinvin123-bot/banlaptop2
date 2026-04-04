<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">
    <h2>➕ Thêm sản phẩm</h2>

    <form method="POST" action="/admin/products">
        @csrf

        <div class="mb-3">
            <label>Tên</label>
            <input name="name" class="form-control">
        </div>

        <div class="mb-3">
            <label>Giá</label>
            <input name="price" class="form-control">
        </div>

        <div class="mb-3">
            <label>Ảnh (img/lap1.jpg)</label>
            <input name="image" class="form-control">
        </div>

        <button class="btn btn-success">Thêm</button>
    </form>
</div>

</body>
</html>