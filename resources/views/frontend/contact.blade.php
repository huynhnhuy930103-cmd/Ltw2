<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Liên hệ - TechShop</title>

    <style>
        body {
            font-family: Arial;
            margin: 0;
            background: #f5f5f5;
        }

        header{
    background:#222;
    color:white;
    padding:30px 0;   /* tăng chiều cao header */
}

.header-container{
    width:90%;
    margin:auto;
    display:flex;
    align-items:center;
    justify-content:space-between;
}

/* logo */

.logo h2{
    margin:0;
    font-size:32px;   /* logo to hơn */
    color:#00bfff;
}

/* menu */

.menu a{
    color:white;
    margin:0 15px;
    text-decoration:none;
    font-weight:bold;
    font-size:18px;   /* chữ menu to hơn */
}

.menu a:hover{
    color:#00bfff;
}

/* search */

.search input{
    padding:10px;
    font-size:16px;
}

.search button{
    padding:10px 15px;
    background:#00bfff;
    border:none;
    color:white;
    cursor:pointer;
    font-size:16px;
}

/* icon giỏ hàng */

.header-icons a{
    font-size:18px;
    margin-left:15px;
    color:white;
    text-decoration:none;
}
.header-icons a:hover{
    color:#00bfff;
}
/* MENU */

.menu a{
    color:white;
    margin:0 10px;
    text-decoration:none;
    font-weight:bold;
}

.menu a:hover{
    color:#00bfff;
}

/* SEARCH */

.search input{
    padding:6px;
    border:none;
}

.search button{
    padding:6px 10px;
    background:#00bfff;
    border:none;
    color:white;
    cursor:pointer;
}

        /* CONTACT */

        .container {
            max-width: 1200px;
            margin: 40px auto;
            display: flex;
            gap: 40px;
        }

        /* INFO */

        .contact-info {
            width: 40%;
            background: #F9DFDF;
            padding: 20px;
            border-radius: 8px;
        }

        .contact-info h2 {
            margin-top: 0;
        }

        /* FORM */

        .contact-form {
            width: 60%;
            background: #F9DFDF;
            padding: 20px;
            border-radius: 8px;
        }

        .contact-form input,
        .contact-form textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .contact-form button {
            padding: 10px 20px;
            background: #007bff;
            border: none;
            color: white;
            cursor: pointer;
            border-radius: 5px;
        }

        .contact-form button:hover {
            background: #0056b3;
        }

        /* FOOTER */

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

    <!-- <header>

        <div class="header-container">

            <div class="logo">
                <h2> NY Tech</h2>
            </div>

            <div class="menu">
                <a href="/">Trang chủ</a>
                <a href="/san-pham">Sản phẩm</a>
                <a href="/lien-he">Liên hệ</a>
            </div>

            <div class="search">
                <input type="text" placeholder="Tìm sản phẩm...">
                <button>Tìm</button>
            </div>

            <div class="header-icons">
                <a href="#">👤 Tài khoản</a>
                <a href="#">🛒 Giỏ hàng (0)</a>
            </div>

        </div>

    </header> -->

    <x-layout-site title="Liên hệ ">
    <div class="container">

        <div class="contact-info">

            <h2>Thông tin liên hệ</h2>

            <p>🏬 Cửa hàng: NY Tech</p>

            <p>📍 Địa chỉ: TP Hồ Chí Minh</p>

            <p>📞 Điện thoại: 0909 123 456</p>

            <p>📧 Email: NYtechshop@gmail.com</p>

            <p>🕒 Giờ mở cửa: 8:00 - 22:00</p>

        </div>


        <div class="contact-form">

            <h2>Gửi liên hệ</h2>

            <form>

                <input type="text" placeholder="Họ và tên">

                <input type="email" placeholder="Email">

                <input type="text" placeholder="Số điện thoại">

                <textarea rows="5" placeholder="Nội dung"></textarea>

                <button type="submit">Gửi liên hệ</button>

            </form>

        </div>

    </div>


    <!-- <footer>

        <p>© 2026 TechShop</p>

    </footer> -->
    </x-layout-site>
</body>

</html>