<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>TechShop - Điện thoại</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="bg-gray-100 text-gray-800 font-sans">

    <!-- HEADER -->
    <header class="bg-gradient-to-r from-blue-600 to-blue-900 text-white py-5">
        <div class="w-[90%] mx-auto flex items-center justify-between flex-wrap gap-4">

            <!-- Logo -->
            <div class="text-2xl font-bold">
                📱 NY Tech
            </div>

            <!-- Menu -->
            <nav class="flex gap-4">
                <a href="/" class="hover:text-blue-300">Trang chủ</a>
                <a href="/san-pham" class="hover:text-blue-300">Sản phẩm</a>
                <a href="/gioi-thieu" class="hover:text-blue-300">Giới thiệu</a>
                <a href="/lien-he" class="hover:text-blue-300">Liên hệ</a>
            </nav>

            <!-- Search -->
            <div class="flex">
                <input type="text"
                    class="px-3 py-2 rounded-l-md text-black outline-none"
                    placeholder="Tìm sản phẩm...">
                <button class="px-4 py-2 bg-orange-500 hover:bg-orange-600 rounded-r-md">
                    Tìm
                </button>
            </div>

            <!-- Right -->
            <div class="flex items-center gap-5">

                <a href="{{ route('site.login') }}"
                    class="flex items-center gap-2 text-white hover:underline">
                    👤 Tài khoản
                </a>

                <a href="/gio-hang"
                    class="cursor-pointer font-medium hover:text-blue-300 flex items-center gap-1">
                    🛒 Giỏ hàng (
                    <span class="bg-white text-orange-500 px-2 py-[2px] rounded-full text-xs">
                        {{ count(session('cart', [])) }}
                    </span>
                    )
                </a>

            </div>

        </div>
    </header>

    <!-- CONTENT -->
    <main class="w-full min-h-[500px]">
        {{ $slot }}
    </main>

    <!-- FOOTER -->
    <footer class="mt-10 bg-gray-900 text-white text-center py-4">
        © 2026 TechShop - Điện thoại & Laptop
    </footer>

</body>

</html>
