

    <style>
        body {
            font-family: Arial;
            margin: 0;
            background: #f5f5f5;
        }

        /* HEADER */

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
        /* PRODUCT DETAIL */

        .container {
            width: 90%;
            margin: auto;
            margin-top: 30px;
            display: flex;
            gap: 40px;
        }

        /* IMAGE */

        .product-image {
            width: 40%;
            background: white;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
        }

        .product-image img {
            width: 300px;
        }

        /* INFO */

        .product-info {
            width: 60%;
            background: white;
            padding: 20px;
            border-radius: 8px;
        }

        .product-info h1 {
            margin-top: 0;
        }

        .price {
            color: red;
            font-size: 24px;
            font-weight: bold;
        }

        /* QUANTITY */

        .quantity {
            margin: 20px 0;
        }

        .quantity input {
            width: 60px;
            padding: 5px;
        }

        /* BUTTON */

        .add-cart {
            padding: 10px 20px;
            background: #ff6600;
            border: none;
            color: white;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }

        .add-cart:hover {
            background: #e65c00;
        }

        /* DESCRIPTION */

        .description {
            margin-top: 20px;
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


    <x-layout-site title="Chi tiết - sản phẩm">
    <div class="container">

        <div class="product-image">

        <img src="{{ asset('img/iphone-15-pro-max.jpg') }}">
        </div>


        <div class="product-info">

            <h1>Iphone 15 Pro Max</h1>
            
            <p class="price">30.000.000đ</p>

            <p>
                Điện thoại iPhone 15 Pro Max với chip A17 Pro mạnh mẽ,
                màn hình Super Retina XDR 6.7 inch,
                camera 48MP và pin sử dụng cả ngày.
            </p>

            <div class="quantity">

                <label>Số lượng:</label>
                <input type="number" value="1" min="1">

            </div>

            <button onclick="alert('Đã thêm vào giỏ')">🛒 Thêm vào giỏ</button>

            <div class="description">

                <h3>Mô tả sản phẩm</h3>

                <p>
                    iPhone 15 Pro Max được thiết kế với khung titanium cao cấp,
                    mang lại độ bền cao và trọng lượng nhẹ.
                    Máy trang bị chip A17 Pro mới nhất giúp xử lý nhanh và tiết kiệm pin.
                </p>

            </div>

        </div>

    </div>

    </x-layout-site>
</body>

