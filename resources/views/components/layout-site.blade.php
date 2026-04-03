<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>TechShop - Điện thoại</title>

    <style>
        body {
            font-family: Arial;
            margin: 0;
            background: #f8fafc;
            color: #1f2937;
        }

        /* HEADER */

        header {
            background: linear-gradient(135deg, #2563eb, #1e40af);
            color: white;
            padding: 20px 0;
        }

        .header-container {
            width: 90%;
            margin: auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .logo h2 {
            margin: 0;
            font-size: 26px;
        }

        .menu a {
            color: white;
            margin: 0 10px;
            text-decoration: none;
            font-weight: 500;
        }

        .menu a:hover {
            color: #93c5fd;
        }


        .header-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .account {
            color: white;
            text-decoration: none;
            font-weight: 500;
        }

        .account:hover {
            color: #93c5fd;
        }

        .cart-header {
            color: white;
            cursor: pointer;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .cart-header:hover {
            color: #93c5fd;
        }


        /* SEARCH */

        .search input {
            padding: 8px;
            border: none;
            border-radius: 6px 0 0 6px;
        }

        .search button {
            padding: 8px 12px;
            background: #f97316;
            border: none;
            color: white;
            border-radius: 0 6px 6px 0;
            cursor: pointer;
        }

        /* CART ICON */

        .cart-icon {
            background: #f97316;
            padding: 8px 12px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
        }

        #cart-count {
            background: white;
            color: #f97316;
            padding: 2px 6px;
            border-radius: 50%;
            font-size: 12px;
            margin-left: 5px;
        }

        /* CONTAINER */

        .container {
            margin: auto;
            margin-top: 20px;
            background: #F8F3E1;
        }

        .products {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .product {
            background: white;
            padding: 15px;
            width: 23%;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 0 5px #ccc;
            transition: 0.3s;
        }

        .product:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .product img {
            width: 180px;
            height: 180px;
            object-fit: cover;
        }

        .price {
            color: red;
            font-weight: bold;
        }

        .add-cart {
            margin-top: 10px;
            padding: 8px 12px;
            background: #ff6600;
            border: none;
            color: white;
            cursor: pointer;
            border-radius: 5px;
        }

        footer {
            margin-top: 40px;
            background: #222;
            color: white;
            text-align: center;
            padding: 15px;
        }
    </style>

</head>

<body>

    <!-- HEADER -->

    <header>
        <div class="header-container">

            <div class="logo">
                <h2>📱 NY Tech</h2>
            </div>

            <div class="menu">
                <a href="/">Trang chủ</a>
                <a href="/san-pham">Sản phẩm</a>
                <a href="/gioi-thieu">Giới thiệu</a>
                <a href="/lien-he">Liên hệ</a>
            </div>

            <div class="search">
                <input type="text" placeholder="Tìm sản phẩm...">
                <button>Tìm</button>
            </div>

            <!-- <div class="cart-icon" onclick="toggleCart()">
🛒 <span id="cart-count">0</span>
</div> -->
            <div class="header-right">
                <a href="#" class="account">👤 Tài khoản</a>
                <div class="cart-header" onclick="toggleCart()">
                    🛒 Giỏ hàng (<span id="cart-count">0</span>)
                </div>
            </div>
        </div>

    </header>


    <!-- Nội dung trang -->
    {{ $slot }}

    <footer>
        <p>© 2026 TechShop - Điện thoại & Laptop</p>
    </footer>

</body>

</html>
