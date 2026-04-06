<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sửa sản phẩm</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f8fafc;
        }

        .form-box {
            max-width: 700px;
            margin: auto;
            margin-top: 50px;
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .title {
            font-weight: bold;
            margin-bottom: 20px;
        }

        img.preview {
            width: 120px;
            border-radius: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

<div class="form-box">

    <h4 class="title">✏️ Sửa thông tin laptop</h4>

    <form method="POST" action="/admin/products/{{ $product->id }}">
        @csrf
        @method('PUT')

        <!-- TÊN -->
        <div class="mb-3">
            <label class="form-label">Tên sản phẩm</label>
            <input type="text" name="name" value="{{ $product->name }}" class="form-control">
        </div>

        <!-- GIÁ -->
        <div class="mb-3">
            <label class="form-label">Giá</label>
            <input type="number" name="price" value="{{ $product->price }}" class="form-control">
        </div>

        <!-- ẢNH -->
        <div class="mb-3">
            <label class="form-label">Ảnh (link)</label>

            <input type="text" name="image" value="{{ $product->image }}" class="form-control">

            <img src="{{ asset($product->image) }}" class="preview">
        </div>

        <!-- MÔ TẢ -->
        <div class="mb-3">
            <label class="form-label">Mô tả</label>
            <textarea name="description" class="form-control" rows="3">{{ $product->description }}</textarea>
        </div>

        <hr>

        <h5>📊 Thông số kỹ thuật</h5>

        <!-- CPU -->
        <div class="mb-3">
            <label>CPU</label>
            <input type="text" name="cpu" value="{{ $product->cpu }}" class="form-control">
        </div>

        <!-- RAM -->
        <div class="mb-3">
            <label>RAM</label>
            <input type="text" name="ram" value="{{ $product->ram }}" class="form-control">
        </div>

        <!-- Ổ CỨNG -->
        <div class="mb-3">
            <label>Ổ cứng</label>
            <input type="text" name="storage" value="{{ $product->storage }}" class="form-control">
        </div>

        <!-- GPU -->
        <div class="mb-3">
            <label>GPU</label>
            <input type="text" name="gpu" value="{{ $product->gpu }}" class="form-control">
        </div>

        <!-- MÀN HÌNH -->
        <div class="mb-3">
            <label>Màn hình</label>
            <input type="text" name="screen" value="{{ $product->screen }}" class="form-control">
        </div>

        <!-- OS -->
        <div class="mb-3">
            <label>Hệ điều hành</label>
            <input type="text" name="os" value="{{ $product->os }}" class="form-control">
        </div>

        <!-- PIN -->
        <div class="mb-3">
            <label>Pin</label>
            <input type="text" name="battery" value="{{ $product->battery }}" class="form-control">
        </div>

        <!-- CÂN NẶNG -->
        <div class="mb-3">
            <label>Trọng lượng</label>
            <input type="text" name="weight" value="{{ $product->weight }}" class="form-control">
        </div>

        <!-- BUTTON -->
        <div class="d-flex justify-content-between mt-4">
            <a href="/admin/products" class="btn btn-secondary">⬅ Quay lại</a>
            <button class="btn btn-primary">💾 Cập nhật</button>
        </div>

    </form>

</div>

</body>
</html>