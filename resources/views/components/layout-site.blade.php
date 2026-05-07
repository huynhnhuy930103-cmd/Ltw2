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
                <a href="/bai-viet" class="hover:text-blue-300">Bài viết</a>
            </nav>

            <!-- Search -->
            <form action="{{ route('site.product.index') }}" method="GET" class="flex">
                <input type="text"
                    name="keyword"
                    value="{{ request('keyword') }}"
                    class="px-3 py-2 rounded-l-md text-black outline-none"
                    placeholder="Tìm sản phẩm...">

                <button type="submit"
                    class="px-4 py-2 bg-orange-500 hover:bg-orange-600 rounded-r-md">
                    Tìm
                </button>
            </form>

            <!-- Right -->
            <div class="relative group">
                <!-- Nút tài khoản -->
                <button class="flex items-center gap-2 text-white hover:text-blue-300">
                    👤 Tài khoản
                    <i class="fa-solid fa-chevron-down text-xs"></i>
                </button>

                <!-- Dropdown -->

                <div class="absolute right-0 mt-2 w-48 bg-white text-gray-800 rounded-md shadow-lg
            opacity-0 invisible translate-y-2
            group-hover:opacity-100 group-hover:visible group-hover:translate-y-0
            transition-all duration-200 z-50">
                    <!-- Nếu chưa đăng nhập -->
                    @if(!session()->has('user_site'))
                    <a href="{{ route('site.login') }}"
                        class="block px-4 py-2 hover:bg-gray-100">
                        🔑 Đăng nhập
                    </a>

                    <a href="/dang-ky"
                        class="block px-4 py-2 hover:bg-gray-100">
                        📝 Đăng ký
                    </a>
                    @else
                    <!-- Nếu đã đăng nhập -->
                    <a href="/thong-tin"
                        class="block px-4 py-2 hover:bg-gray-100">
                        👤 Thông tin tài khoản
                    </a>

                    <hr>

                    <form action="/dang-xuat" method="post">
                        @csrf
                        <button type="submit"
                            class="block w-full text-left px-4 py-2 hover:bg-red-100 text-red-600">
                            🚪 Đăng xuất
                        </button>
                    </form>
                    @endif

                </div>
            </div>

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
    <x-menu-footer />

</body>

</html>
