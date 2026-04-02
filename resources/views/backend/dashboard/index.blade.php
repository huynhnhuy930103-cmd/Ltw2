<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Admin - NY Tech</title>
    <style>
        /* ===== BODY ===== */
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #eef2f7;
            margin: 0;
            display: flex;
        }

        /* ===== SIDEBAR ===== */
        .sidebar {
            width: 240px;
            background: linear-gradient(180deg, #1e272e, #2f3542);
            color: white;
            height: 100vh;
            position: fixed;
            display: flex;
            flex-direction: column;
        }

        .sidebar h2 {
            text-align: center;
            padding: 20px 0;
            margin: 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar a {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #dcdde1;
            padding: 12px 20px;
            text-decoration: none;
            transition: 0.3s;
        }

        .sidebar a.active,
        .sidebar a:hover {
            background: #57606f;
            color: white;
            padding-left: 25px;
        }

        /* ===== MAIN ===== */
        .main {
            margin-left: 240px;
            flex: 1;
        }

        /* ===== HEADER ===== */
        .header {
            background: white;
            padding: 15px 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .header h3 {
            margin: 0;
        }

        .header a {
            text-decoration: none;
            color: #007bff;
        }

        /* ===== CONTENT ===== */
        .content {
            padding: 25px;
        }

        /* ===== CARDS ===== */
        .cards {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card h3 {
            margin: 0;
            font-size: 30px;
            color: #007bff;
        }

        .card p {
            color: #888;
        }

        /* ===== TABLE ===== */
        table {
            width: 100%;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            border-collapse: collapse;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }

        table th,
        table td {
            padding: 12px;
            text-align: center;
        }

        table th {
            background: #f1f3f6;
        }

        table tr:hover {
            background: #f9fbfd;
        }

        /* ===== PRODUCT IMAGE ===== */
        .product-img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
        }

        /* ===== BUTTONS ===== */
        button,
        .btn {
            padding: 6px 12px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        button.edit,
        .btn-edit {
            background: #3498db;
            color: white;
        }

        button.edit:hover,
        .btn-edit:hover {
            background: #2980b9;
        }

        button.delete,
        .btn-delete {
            background: #e74c3c;
            color: white;
        }

        button.delete:hover,
        .btn-delete:hover {
            background: #c0392b;
        }

        /* ===== BADGES ===== */
        .badge {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            color: white;
        }

        .badge.active {
            background: #2ecc71;
        }

        .badge.hide {
            background: #e67e22;
        }
    </style>
</head>

<body>

    <!-- SIDEBAR -->
    <div class="sidebar">
        <h2>NY Tech</h2>
        <a href="/admin" class="active">📊 Dashboard</a>
        <a href="/admin/products">📦 Sản phẩm</a>
        <a href="/admin/categories">📂 Danh mục</a>
        <a href="/admin/orders">🛒 Đơn hàng</a>
        <a href="/admin/users">👤 Người dùng</a>
    </div>

    <!-- MAIN -->

    <div class="main">
        <div class="header">
            <h3>👋 Chào Admin!</h3>
            <div>Admin | <a href="/">Trang chủ</a></div>
        </div>

        <div class="content">

            <!-- DASHBOARD CARDS -->
            <div class="cards">
                <div class="card">
                    <h3>120</h3>
                    <p>Sản phẩm</p>
                </div>
                <div class="card">
                    <h3>45</h3>
                    <p>Đơn hàng</p>
                </div>
                <div class="card">
                    <h3>30</h3>
                    <p>Khách hàng</p>
                </div>
                <div class="card">
                    <h3>150tr</h3>
                    <p>Doanh thu</p>
                </div>
            </div>

            <!-- TABLE -->
            <h2>Sản phẩm mới</h2>
            <a href="#" class="btn btn-edit" style="margin-bottom:10px;">➕ Thêm sản phẩm</a>
            <!-- <table>
                <tr>
                    <th>ID</th>
                    <th>Hình</th>
                    <th>Tên</th>
                    <th>Giá</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>

                <tr>
                    <td>1</td>
                    <td><img src="img/iphone-15-pro-max.jpg" class="product-img"></td>
                    <td>Iphone 15 Pro Max</td>
                    <td>30.000.000đ</td>
                    <td><span class="badge active">Hiện</span></td>
                    <td>
                        <button class="edit">Sửa</button>
                        <button class="delete">Xóa</button>
                    </td>
                </tr>

                <tr>
                    <td>2</td>
                    <td><img src="img/macbook-e.jpg" class="product-img"></td>
                    <td>Macbook Air M2</td>
                    <td>28.000.000đ</td>
                    <td><span class="badge hide">Ẩn</span></td>
                    <td>
                        <button class="edit">Sửa</button>
                        <button class="delete">Xóa</button>
                    </td>
                </tr>

                <tr>
                    <td>3</td>
                    <td><img src="img/ss s24.jpg" class="product-img"></td>
                    <td>Samsung Galaxy S24</td>
                    <td>24.000.000đ</td>
                    <td><span class="badge active">Hiện</span></td>
                    <td>
                        <button class="edit">Sửa</button>
                        <button class="delete">Xóa</button>
                    </td>
                </tr>

            </table> -->
        </div>
    </div>

</body>

</html>
