

<style>

body{
    font-family:Arial;
    margin:0;
    background:#f8fafc;
    color:#1f2937;
}

/* HEADER */

header{
    background:linear-gradient(135deg,#2563eb,#1e40af);
    color:white;
    padding:20px 0;
}

.header-container{
    width:90%;
    margin:auto;
    display:flex;
    align-items:center;
    justify-content:space-between;
    flex-wrap:wrap;
}

.logo h2{
    margin:0;
    font-size:26px;
}

.menu a{
    color:white;
    margin:0 10px;
    text-decoration:none;
    font-weight:500;
}

.menu a:hover{
    color:#93c5fd;
}


.header-right{
    display:flex;
    align-items:center;
    gap:20px;
}

.account{
    color:white;
    text-decoration:none;
    font-weight:500;
}

.account:hover{
    color:#93c5fd;
}

.cart-header{
    color:white;
    cursor:pointer;
    font-weight:500;
    display:flex;
    align-items:center;
    gap:5px;
}

.cart-header:hover{
    color:#93c5fd;
}


/* SEARCH */

.search input{
    padding:8px;
    border:none;
    border-radius:6px 0 0 6px;
}

.search button{
    padding:8px 12px;
    background:#f97316;
    border:none;
    color:white;
    border-radius:0 6px 6px 0;
    cursor:pointer;
}

/* CART ICON */

.cart-icon{
    background:#f97316;
    padding:8px 12px;
    border-radius:8px;
    cursor:pointer;
    font-weight:bold;
}

#cart-count{
    background:white;
    color:#f97316;
    padding:2px 6px;
    border-radius:50%;
    font-size:12px;
    margin-left:5px;
}

/* MAIN */

.main{
    width:90%;
    margin:20px auto;
    display:flex;
    gap:20px;
}

/* SIDEBAR */

.sidebar{
    width:250px;
    background:white;
    padding:20px;
    border-radius:12px;
    box-shadow:0 5px 15px rgba(0,0,0,0.05);
}

.sidebar h3{
    margin-top:0;
    color:#2563eb;
}

.sidebar a{
    display:block;
    padding:8px 0;
    text-decoration:none;
    color:#374151;
}

.sidebar a:hover{
    color:#2563eb;
    transform:translateX(5px);
}

/* CONTENT */

.content{
    flex:1;
}

.products{
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:20px;
}

/* PRODUCT */

.product{
    background:white;
    padding:15px;
    border-radius:15px;
    text-align:center;
    box-shadow:0 10px 25px rgba(0,0,0,0.05);
    transition:0.3s;
    position:relative;
}

.product:hover{
    transform:translateY(-8px);
    box-shadow:0 15px 30px rgba(0,0,0,0.1);
}

.product img{
    width:150px;
    height:150px;
    object-fit:contain;
    transition:0.3s;
}

.product:hover img{
    transform:scale(1.1);
}

.product h4{
    margin:10px 0;
}

.price{
    color:#ef4444;
    font-weight:bold;
    font-size:18px;
}

/* SALE */

.sale{
    position:absolute;
    top:10px;
    left:10px;
    background:#ef4444;
    color:white;
    font-size:12px;
    padding:4px 6px;
    border-radius:6px;
}

/* BUTTON */

.btn{
    margin-top:10px;
}

.view{
    background:#2563eb;
    color:white;
    padding:8px 14px;
    border-radius:6px;
    text-decoration:none;
    font-size:14px;
    display:inline-flex;
    align-items:center;
    gap:5px;
    transition:0.3s;
}

.view:hover{
    background:#1e40af;
    transform:translateY(-2px);
}

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

/* CART BOX */

.cart-box{
    position:fixed;
    right:20px;
    top:80px;
    width:320px;
    background:white;
    border-radius:12px;
    padding:15px;
    box-shadow:0 15px 35px rgba(0,0,0,0.2);
    display:none;
}

.cart-item{
    display:flex;
    justify-content:space-between;
    margin-bottom:10px;
    font-size:14px;
}

.remove{
    color:red;
    cursor:pointer;
}

/* FOOTER */

footer{
    margin-top:40px;
    background:#1f2937;
    color:#d1d5db;
    text-align:center;
    padding:15px;
}

/* RESPONSIVE */

@media (max-width:1024px){
    .products{
        grid-template-columns:repeat(3,1fr);
    }
}

@media (max-width:768px){
    .main{
        flex-direction:column;
    }

    .sidebar{
        width:100%;
    }

    .products{
        grid-template-columns:repeat(2,1fr);
    }
}

@media (max-width:480px){
    .products{
        grid-template-columns:1fr;
    }
}

</style>
</head>

<body>



<!-- MAIN -->
  <x-layout-site title="Sản phẩm - TechShop">

<div class="main">

<div class="sidebar">

<h3>Danh mục</h3>
<a href="#">📱 Điện thoại</a>
<a href="#">💻 Laptop</a>
<a href="#">🎧 Phụ kiện</a>

<h3>Thương hiệu</h3>
<a href="#">Apple</a>
<a href="#">Samsung</a>
<a href="#">Xiaomi</a>
<a href="#">Dell</a>
<a href="#">Asus</a>

</div>

<div class="content">

<h2>Tất cả sản phẩm</h2>

<div class="products">

<div class="product">
<span class="sale">-10%</span>
<img src="{{ asset('img/iphone-15-pro-max.jpg') }}">
<h4>Iphone 15 Pro Max</h4>
<p class="price">30.000.000đ</p>
<div class="btn">
<a href="san-pham/{slug}" class="view">👁 Xem</a>
<button class="cart" onclick="addToCart('Iphone 15 Pro Max',30000000)">🛒 Thêm vào giỏ</button>
</div>
</div>

<div class="product">
<img src="{{ asset('img/ss s24.jpg') }}">
<h4>Samsung Galaxy S24</h4>
<p class="price">24.000.000đ</p>
<div class="btn">
<a href="san-pham/{slug}" class="view">👁 Xem</a>
<button class="cart" onclick="addToCart('Samsung Galaxy S24',24000000)">🛒 Thêm vào giỏ</button>
</div>
</div>

<div class="product">
<img src="{{ asset('img/macbook-e.jpg') }}">
<h4>Macbook Air M2</h4>
<p class="price">28.000.000đ</p>
<div class="btn">
<a href="san-pham/{slug}" class="view">👁 Xem</a>
<button class="cart" onclick="addToCart('Macbook Air M2',28000000)">🛒 Thêm vào giỏ</button>
</div>
</div>

<div class="product">
<img src="{{ asset('img/asus-gaming.jpg') }}">
<h4>Asus TUF Gaming</h4>
<p class="price">22.000.000đ</p>
<div class="btn">
<a href="san-pham/{slug}" class="view">👁 Xem</a>
<button class="cart" onclick="addToCart('Asus TUF',22000000)">🛒 Thêm vào giỏ</button>
</div>
</div>

<div class="product">
<img src="{{ asset('img/ip14.jpg') }}">
<h4>Iphone 14</h4>
<p class="price">20.000.000đ</p>
<div class="btn">
<a href="san-pham/{slug}" class="view">👁 Xem</a>
<button class="cart" onclick="addToCart('Iphone 14',20000000)">🛒 Thêm vào giỏ</button>
</div>
</div>

<div class="product">
<img src="{{ asset('img/ip13.jpg') }}">
<h4>Iphone 13</h4>
<p class="price">16.000.000đ</p>
<div class="btn">
<a href="san-pham/{slug}" class="view">👁 Xem</a>
<button class="cart" onclick="addToCart('Iphone 13',16000000)">🛒 Thêm vào giỏ</button>
</div>
</div>

<div class="product">
<img src="{{ asset('img/ss s23.jpg') }}">
<h4>Samsung Galaxy S23</h4>
<p class="price">18.500.000đ</p>
<div class="btn">
<a href="san-pham/{slug}" class="view">👁 Xem</a>
<button class="cart" onclick="addToCart('Samsung S23',18500000)">🛒 Thêm vào giỏ</button>
</div>
</div>

<div class="product">
<img src="{{ asset('img/xiaomi-13t.jpg') }}">
<h4>Xiaomi 13T</h4>
<p class="price">13.500.000đ</p>
<div class="btn">
<a href="san-pham/{slug}" class="view">👁 Xem</a>
<button class="cart" onclick="addToCart('Xiaomi 13T',13500000)">🛒 Thêm vào giỏ</button>
</div>
</div>

<div class="product">
<img src="{{ asset('img/oppo-reno11.jpg') }}">
<h4>Oppo Reno 11</h4>
<p class="price">11.500.000đ</p>
<div class="btn">
<a href="san-pham/{slug}" class="view">👁 Xem</a>
<button class="cart" onclick="addToCart('Oppo Reno 11',11500000)">🛒 Thêm vào giỏ</button>
</div>
</div>

<div class="product">
<img src="{{ asset('img/vivo-v30.jpg') }}">
<h4>Vivo V30</h4>
<p class="price">10.500.000đ</p>
<div class="btn">
<a href="san-pham/{slug}" class="view">👁 Xem</a>
<button class="cart" onclick="addToCart('Vivo V30',10500000)">🛒 Thêm vào giỏ</button>
</div>
</div>

<div class="product">
<img src="{{ asset('img/realme-12.jpg') }}">
<h4>Realme 12</h4>
<p class="price">7.500.000đ</p>
<div class="btn">
<a href="san-pham/{slug}" class="view">👁 Xem</a>
<button class="cart" onclick="addToCart('Realme 12',7500000)">🛒 Thêm vào giỏ</button>
</div>
</div>

<div class="product">
<img src="{{ asset('img/nokia-g42.jpg') }}">
<h4>Nokia G42</h4>
<p class="price">5.500.000đ</p>
<div class="btn">
<a href="san-pham/{slug}" class="view">👁 Xem</a>
<button class="cart" onclick="addToCart('Nokia G42',5500000)">🛒 Thêm vào giỏ</button>
</div>
</div>



</div>

</div>

</div>

<!-- CART BOX -->

<div class="cart-box" id="cartBox">
<h3>🛒 Giỏ hàng</h3>
<div id="cart-items"></div>
<p><b>Tổng:</b> <span id="total">0</span>đ</p>
</div>




 </x-layout-site>
<!-- JS -->

<script>

let cart = JSON.parse(localStorage.getItem("cart")) || [];

function addToCart(name, price){
    cart.push({name, price});
    localStorage.setItem("cart", JSON.stringify(cart));
    renderCart();
}

function renderCart(){
    let box = document.getElementById("cart-items");
    let total = 0;
    box.innerHTML = "";

    cart.forEach((item, index)=>{
        total += item.price;
        box.innerHTML += `
        <div class="cart-item">
        ${item.name} - ${item.price.toLocaleString()}đ
        <span class="remove" onclick="removeItem(${index})">❌</span>
        </div>`;
    });

    document.getElementById("total").innerText = total.toLocaleString();
    document.getElementById("cart-count").innerText = cart.length;
}

function removeItem(index){
    cart.splice(index,1);
    localStorage.setItem("cart", JSON.stringify(cart));
    renderCart();
}

function toggleCart(){
    let box = document.getElementById("cartBox");
    box.style.display = box.style.display === "block" ? "none" : "block";
}

renderCart();

</script>

</body>
</html>