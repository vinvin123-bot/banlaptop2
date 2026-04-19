<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Register</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            height: 100vh;
            background: linear-gradient(135deg, #667eea, #764ba2);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-box {
            width: 350px;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }

        .btn-register {
            background: #667eea;
            border: none;
        }

        .btn-register:hover {
            background: #5a67d8;
        }
    </style>
</head>

<body>

<div class="login-box">

    <h3 class="text-center mb-3">📝 Đăng ký</h3>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="/register">
        @csrf

        <div class="mb-3">
            <label>Họ tên</label>
            <input name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input name="password" type="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Nhập lại Password</label>
            <input name="password_confirmation" type="password" class="form-control" required>
        </div>

        <button class="btn btn-register w-100 text-white">Đăng ký</button>
    </form>

    <div class="text-center mt-3">
        <a href="/login">Đã có tài khoản? Đăng nhập</a>
    </div>

</div>

</body>
</html>