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
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(124,58,237,0.3);
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
    </style>
</head>

<body>

<div class="container mt-5">

    <div class="box">

        <h3 class="mb-4">📦 Quản lý đơn hàng</h3>

        <table class="table table-bordered text-center align-middle">

            <tr>
                <th>Tên</th>
                <th>SĐT</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>

            @foreach($orders as $o)

            <tr>
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
                    @if($o->status == 'pending')
                        <a href="/admin/orders/{{ $o->id }}/deliver"
                           class="btn btn-ship btn-sm text-white">
                           🚚 Giao hàng
                        </a>
                    @else
                        <button class="btn btn-success btn-sm" disabled>
                            ✔ Đã giao
                        </button>
                    @endif
                </td>
            </tr>

            @endforeach

        </table>

    </div>

</div>

</body>
</html>