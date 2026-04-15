<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đơn hàng</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #0f172a;
            color: white;
        }

        .box {
            background: #1e293b;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(124,58,237,0.4);
        }

        h3 {
            color: #7c3aed;
        }

        .table th {
            background: #020617;
            color: #7c3aed;
        }

        .table td {
            background: #020617;
            color: #e5e7eb;
        }

        .status-pending {
            color: #facc15;
            font-weight: bold;
        }

        .status-done {
            color: #22c55e;
            font-weight: bold;
        }

        .btn-ship {
            background: #7c3aed;
            border: none;
        }

        .btn-ship:hover {
            background: #6d28d9;
            box-shadow: 0 0 10px #7c3aed;
        }

        .btn-delete {
            background: #dc2626;
            border: none;
        }

        .btn-delete:hover {
            background: #b91c1c;
            box-shadow: 0 0 10px #dc2626;
        }

        .alert-success {
            background: #22c55e;
            border: none;
            color: white;
        }
    </style>
</head>

<body>

<div class="container mt-5">

    <div class="box">

        <h3 class="mb-4">📦 Quản lý đơn hàng</h3>

        <!-- THÔNG BÁO -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered text-center align-middle">

            <tr>
                <th>#</th>
                <th>Tên</th>
                <th>SĐT</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>

            @foreach($orders as $o)

            <tr>
                <td>{{ $o->id }}</td>
                <td>{{ $o->name }}</td>
                <td>{{ $o->phone }}</td>
                <td>{{ number_format($o->total) }}đ</td>

                <td>
                    @if($o->status == 'pending')
                        <span class="status-pending">⏳ Chờ xử lý</span>
                    @else
                        <span class="status-done">✅ Đã giao</span>
                    @endif
                </td>

                <td>

                    <!-- GIAO HÀNG -->
                    @if($o->status == 'pending')
                        <a href="/admin/orders/{{ $o->id }}/deliver"
                           class="btn btn-ship btn-sm text-white mb-1">
                           🚚 Giao
                        </a>
                    @else
                        <button class="btn btn-success btn-sm mb-1" disabled>
                            ✔ Đã giao
                        </button>
                    @endif

                    <!-- XÓA -->
                    <form action="/admin/orders/{{ $o->id }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-delete btn-sm"
                                onclick="return confirm('Bạn có chắc muốn xóa đơn này?')">
                            🗑 Xóa
                        </button>
                    </form>

                </td>
            </tr>

            @endforeach

        </table>

    </div>

</div>

</body>
</html>