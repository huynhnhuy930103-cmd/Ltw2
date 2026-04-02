<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Giới thiệu - TechShop</title>

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
}

.logo h2{
    margin:0;
}

.menu a{
    color:white;
    margin:0 10px;
    text-decoration:none;
}

.menu a:hover{
    color:#93c5fd;
}

/* ACTIVE MENU */

.menu .active{
    border-bottom:2px solid white;
}

/* CONTENT */

.container{
    width:80%;
    margin:40px auto;
    background:white;
    padding:30px;
    border-radius:12px;
    box-shadow:0 10px 25px rgba(0,0,0,0.05);
}

h1{
    color:#2563eb;
}

.section{
    margin-top:20px;
}

.section h3{
    color:#1e40af;
}

/* FOOTER */

footer{
    margin-top:40px;
    background:#1f2937;
    color:#d1d5db;
    text-align:center;
    padding:15px;
}

</style>
</head>

<body>



<!-- CONTENT -->
 <x-layout-site title="Giới thiệu - TechShop">
<div class="container">

<h1>Giới thiệu về TechShop</h1>

<p>
NYTechShop là cửa hàng chuyên cung cấp các sản phẩm công nghệ như điện thoại, laptop và phụ kiện chính hãng.
Chúng tôi cam kết mang đến cho khách hàng sản phẩm chất lượng cao với giá cả hợp lý 💙
</p>

<div class="section">
<h3>🎯 Sứ mệnh</h3>
<p>
Mang đến trải nghiệm mua sắm công nghệ tốt nhất cho khách hàng Việt Nam.
</p>
</div>

<div class="section">
<h3>🔥 Tại sao chọn chúng tôi?</h3>
<ul>
<li>✔ Sản phẩm chính hãng 100%</li>
<li>✔ Giá tốt - nhiều ưu đãi</li>
<li>✔ Bảo hành uy tín</li>
<li>✔ Giao hàng nhanh</li>
</ul>
</div>

<div class="section">
<h3>📞 Liên hệ</h3>
<p>Email: techshop@gmail.com</p>
<p>Hotline: 0123 456 789</p>
</div>

</div>


    </x-layout-site>
</body>

</html>