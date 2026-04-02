

<style>

body{
    font-family: Arial, sans-serif;
    margin:0;
    background:#f5f5f5;
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

/* BANNER */

/* BANNER SLIDER */

.banner{
width:90%;
margin:20px auto;
overflow:hidden;
border-radius:10px;
position:relative;
}

.slides{
display:flex;
width:300%;
animation:slide 12s infinite;
}

.slides img{
width:100%;
height:350px;
object-fit:cover;
}

/* animation chạy ảnh */

@keyframes slide{
0%{margin-left:0}
30%{margin-left:0}

35%{margin-left:-100%}
65%{margin-left:-100%}

70%{margin-left:-200%}
100%{margin-left:-200%}
}

/* CONTAINER */

.container h2{
    text-align:center;
    margin-bottom:20px;
}

.container{
    /* width:90%; */
    margin:auto;
    margin-top:20px;
    background-color: #F8F3E1;
}

/* PRODUCTS */

/* .products{
    display:flex;
    flex-wrap:wrap;
    gap:20px;
}

.product{
    background:white;
    padding:15px;
    width:220px;
    border-radius:8px;
    text-align:center;
    box-shadow:0 0 5px #ccc;
}

.product img{
    width:150px;
    height:150px;
}

.product:hover{
    transform:translateY(-5px);
}

.price{
    color:red;
    font-weight:bold;
} */

.products{
    display:flex;
    flex-wrap:wrap;
    gap:20px;
    justify-content:center;
}

.product{
    background:white;
    padding:15px;
    width:23%;
    border-radius:8px;
    text-align:center;
    box-shadow:0 0 5px #ccc;
    transition:0.3s;
    
}
.product:hover{
    transform:translateY(-8px);
    box-shadow:0 10px 20px rgba(0,0,0,0.2);
}
.product img{
    width:180px;
    height:180px;
    object-fit:cover;
    margin-bottom:10px;
}
/* nút thêm vào giỏ hàng */
.cart{
    background:#f97316;
    border:none;
    color:white;
    padding:6px 10px;
    border-radius:6px;
    cursor:pointer;
    margin-left:5px;
}

.cart:hover{
    background:#ea580c;
}

/* FOOTER */

footer{
    margin-top:40px;
    background:#222;
    color:white;
    text-align:center;
    padding:15px;
}

</style>

</head>

<body>



<x-layout-site title="Trang chủ ">






<!-- BANNER -->

<div class="banner">

<div class="slides">

<img src="{{ asset('img/banner1.jpg') }}">
<img src="{{ asset('img/banner2.jpg') }}">
<img src="{{ asset('img/banner3.jpg') }}">
<img src="{{ asset('img/banner4.jpg') }}">
<img src="{{ asset('img/banner5.jpg') }}">
<img src="{{ asset('img/banner6.jpg') }}">
<img src="{{ asset('img/banner7.jpg') }}">
<img src="{{ asset('img/banner8.jpg') }}">
<img src="{{ asset('img/banner9.jpg') }}">
<img src="{{ asset('img/banner10.jpg') }}">


</div>

</div>

<div class="container">

<h2>Điện thoại nổi bật 📱</h2>

<div class="products">

<div class="product">
<img src="{{ asset('img/iphone-15-pro-max.jpg') }}">
<h3>Iphone 15 Pro Max</h3>
<p class="price">30.000.000đ</p>
<button class="cart" onclick="addToCart('Iphone 15 Pro Max',30000000)">🛒 Thêm vào giỏ</button>
</div>

<div class="product">
<img src="{{ asset('img/ss s24.jpg') }}">
<h3>Samsung Galaxy S24</h3>
<p class="price">24.000.000đ</p>
<button class="add-cart">🛒 Thêm vào giỏ</button>
</div>

<div class="product">
<img src="{{ asset('img/xiaomi13.jpg') }}">
<h3>Xiaomi 13</h3>
<p class="price">18.000.000đ</p>
<button class="add-cart">🛒 Thêm vào giỏ</button>
</div>

<div class="product">
<img src="{{ asset('img/oppo-reno-10.jpg') }}">
<h3>Oppo Reno 10</h3>
<p class="price">12.000.000đ</p>
<button class="add-cart">🛒 Thêm vào giỏ</button>
</div>

<div class="product">
<img src="{{ asset('img/v29.jpg') }}">
<h3>Vivo V29</h3>
<p class="price">11.000.000đ</p>
<button class="add-cart">🛒 Thêm vào giỏ</button>
</div>

<div class="product">
<img src="{{ asset('img/realme-11.jpg') }}">
<h3>Realme 11</h3>
<p class="price">8.500.000đ</p>
<button class="add-cart">🛒 Thêm vào giỏ</button>
</div>

<div class="product">
<img src="{{ asset('img/ip14.jpg') }}">
<h3>Iphone 14 Pro Max</h3>
<p class="price">27.000.000đ</p>
<button class="add-cart">🛒 Thêm vào giỏ</button>
</div>

<div class="product">
<img src="{{ asset('img/ss-flip5.jpg') }}">
<h3>Samsung Galaxy Z Flip5</h3>
<p class="price">21.000.000đ</p>
<button class="add-cart">🛒 Thêm vào giỏ</button>
</div>

<div class="product">
<img src="{{ asset('img/xiaomi-redmi-note-13.jpg') }}">
<h3>Xiaomi Redmi Note 13</h3>
<p class="price">7.500.000đ</p>
<button class="add-cart">🛒 Thêm vào giỏ</button>
</div>

</div>



<h2 style="margin-top:40px;">Laptop nổi bật 💻</h2>

<div class="products">

<div class="product">
<img src="{{ asset('img/macbook-e.jpg') }}">
<h3>Macbook Air M2</h3>
<p class="price">28.000.000đ</p>
<button class="add-cart">🛒 Thêm vào giỏ</button>
</div>

<div class="product">
<img src="{{ asset('img/asus-gaming.jpg') }}">
<h3>Asus TUF Gaming</h3>
<p class="price">22.000.000đ</p>
<button class="add-cart">🛒 Thêm vào giỏ</button>
</div>

<div class="product">
<img src="{{ asset('img/dell-inspiron.jpg') }}">
<h3>Dell Inspiron</h3>
<p class="price">19.000.000đ</p>
<button class="add-cart">🛒 Thêm vào giỏ</button>
</div>

<div class="product">
<img src="{{ asset('img/hp.jpg') }}">
<h3>HP Pavilion</h3>
<p class="price">20.000.000đ</p>
<button class="add-cart">🛒 Thêm vào giỏ</button>
</div>

<div class="product">
<img src="{{ asset('img/lenvono.jpg') }}">
<h3>Lenovo Ideapad</h3>
<p class="price">17.000.000đ</p>
<button class="add-cart">🛒 Thêm vào giỏ</button>
</div>

<div class="product">
<img src="{{ asset('img/acer.jpg') }}">
<h3>Acer Aspire 5</h3>
<p class="price">16.000.000đ</p>
<button class="add-cart">🛒 Thêm vào giỏ</button>
</div>

<div class="product">
<img src="{{ asset('img/hp-15.jpg') }}">
<h3>HP Pavilion 15</h3>
<p class="price">20.000.000đ</p>
<button class="add-cart">🛒 Thêm vào giỏ</button>
</div>

<div class="product">
<img src="{{ asset('img/lenovo-5.jpg') }}">
<h3>Lenovo Ideapad 5</h3>
<p class="price">17.000.000đ</p>
<button class="add-cart">🛒 Thêm vào giỏ</button>
</div>

<div class="product">
<img src="{{ asset('img/acer5.jpg') }}">
<h3>Acer Aspire 5</h3>
<p class="price">16.000.000đ</p>
<button class="add-cart">🛒 Thêm vào giỏ</button>
</div>



</div>

</div>


</x-layout-site>
</body>
</html>