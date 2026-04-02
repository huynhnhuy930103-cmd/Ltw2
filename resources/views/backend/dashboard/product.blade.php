<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Quản lý sản phẩm - NY Tech</title>

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #eef2f7;
            margin: 0;
            display: flex;
        }

        /* SIDEBAR */
        .sidebar {
            width: 240px;
            background: linear-gradient(180deg, #1e272e, #2f3542);
            color: white;
            height: 100vh;
            position: fixed;
        }

        .sidebar h2 {
            text-align: center;
            padding: 20px 0;
            margin: 0;
        }

        .sidebar a {
            display: block;
            padding: 12px 20px;
            color: #dcdde1;
            text-decoration: none;
        }

        .sidebar a.active,
        .sidebar a:hover {
            background: #57606f;
            color: white;
            padding-left: 25px;
        }

        /* MAIN */
        .main {
            margin-left: 240px;
            flex: 1;
        }

        .header {
            background: white;
            padding: 15px 25px;
            display: flex;
            justify-content: space-between;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .content {
            padding: 25px;
        }

        /* SEARCH + ACTION */
        .top-bar {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        input {
            padding: 8px;
            border-radius: 6px;
            border: 1px solid #ccc;
            width: 250px;
        }

        .btn {
            padding: 8px 14px;
            border-radius: 6px;
            text-decoration: none;
            color: white;
        }

        .btn-add {
            background: #2ecc71;
        }

        .btn-add:hover {
            background: #27ae60;
        }

        /* TABLE */
        table {
            width: 100%;
            background: white;
            border-radius: 10px;
            border-collapse: collapse;
            overflow: hidden;
        }

        th,
        td {
            padding: 12px;
            text-align: center;
        }

        th {
            background: #f1f3f6;
        }

        tr:hover {
            background: #f9fbfd;
        }

        /* IMG */
        .product-img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
        }

        /* BUTTON */
        .edit {
            background: #3498db;
            color: white;
            padding: 6px 10px;
            border-radius: 5px;
            border: none;
        }

        .delete {
            background: #e74c3c;
            color: white;
            padding: 6px 10px;
            border-radius: 5px;
            border: none;
        }

        /* BADGE */
        .badge {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            color: white;
        }

        .active {
            background: #2ecc71;
        }

        .hide {
            background: #e67e22;
        }
    </style>
</head>

<body>

    <!-- SIDEBAR -->
    <div class="sidebar">
        <h2>NY Tech</h2>
        <a href="/admin">📊 Dashboard</a>
        <a href="/admin/products" class="active">📦 Sản phẩm</a>
        <a href="/admin/categories">📂 Danh mục</a>
        <a href="/admin/orders">🛒 Đơn hàng</a>
        <a href="/admin/users">👤 Người dùng</a>
    </div>

    <!-- MAIN -->
    <div class="main">

        <div class="header">
            <h3>📦 Quản lý sản phẩm</h3>
            <div>Admin | <a href="/">Trang chủ</a></div>
        </div>

        <div class="content">

            <!-- SEARCH + ADD -->
            <div class="top-bar">
                <input type="text" placeholder="🔍 Tìm sản phẩm...">
                <a href="{{ route('admin.product.create') }}" class="btn btn-add">➕ Thêm sản phẩm</a>
                <a href="{{ route('admin.product.trash') }}" class="btn btn-add">Thùng rác</a>
            </div>

            <!-- TABLE -->
            <table>
                <tr>
                    <th>ID</th>
                    <th>Hình</th>
                    <th>Tên</th>
                    <th>Giá</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>

                @foreach($products as $item)
                <tr>
                    <td>{{ $item->id }}</td>

                    <td>
                        <img src="{{ asset('images/products/' . $item->image) }}" class="product-img">
                    </td>

                    <td>{{ $item->name }}</td>

                    <td>{{ number_format($item->price_buy) }} đ</td>

                    <td>
                        @if($item->status == 1)
                        <span class="badge active">Ẩn</span>
                        @else
                        <span class="badge hide">Hiện</span>
                        @endif
                    </td>

                    <td>
                        <a href="{{ route('admin.product.edit', $item->id) }}" class="edit">Sửa</a>

                        <form action="{{ route('admin.product.delete', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="delete" onclick="return confirm('Xóa sản phẩm này?')">Xóa</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
            <!-- <div class="p-4">
    {{ $products->links() }}
</div> -->

        </div>
    </div>

</body>

</html>
