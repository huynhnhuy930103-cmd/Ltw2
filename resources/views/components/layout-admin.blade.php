<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Admin</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-sans bg-gray-100 flex">

    <!-- SIDEBAR -->
<div class="w-60 h-screen fixed bg-gradient-to-b from-gray-900 via-gray-800 to-gray-700 text-white shadow-lg">

    <h2 class="text-center py-5 text-xl font-bold border-b border-gray-600 tracking-wide">
        🚀 NY Tech
    </h2>

    <nav class="mt-2 space-y-1">

        <!-- DASHBOARD -->
        <a href="/admin"
            class="flex items-center gap-2 px-5 py-3 text-gray-300 hover:bg-blue-500 hover:text-white transition rounded-r-full">
            📊 Dashboard
        </a>

        <!-- PRODUCT -->
        <a href="/admin/product"
            class="flex items-center gap-2 px-5 py-3 text-gray-300 hover:bg-blue-500 hover:text-white transition rounded-r-full">
            📦 Sản phẩm
        </a>

        <!-- CATEGORY -->
        <a href="/admin/category"
            class="flex items-center gap-2 px-5 py-3 text-gray-300 hover:bg-purple-500 hover:text-white transition rounded-r-full">
            📂 Danh mục
        </a>

        <!-- BRAND -->
        <a href="/admin/brand"
            class="flex items-center gap-2 px-5 py-3 text-gray-300 hover:bg-yellow-500 hover:text-white transition rounded-r-full">
            🏷️ Thương hiệu
        </a>

        <!-- TOPIC -->
        <a href="/admin/topic"
            class="flex items-center gap-2 px-5 py-3 text-gray-300 hover:bg-cyan-500 hover:text-white transition rounded-r-full">
            🧩 Chủ đề
        </a>

        <!-- POST -->
        <a href="/admin/post"
            class="flex items-center gap-2 px-5 py-3 text-gray-300 hover:bg-indigo-500 hover:text-white transition rounded-r-full">
            📝 Bài viết
        </a>


        <!-- BANNER -->
         <a href="/admin/banner"
            class="flex items-center gap-2 px-5 py-3 text-gray-300 hover:bg-teal-500 hover:text-white transition rounded-r-full">
            🖼️ Banner
        </a>

        <!-- MENU -->
        <a href="/admin/menu"
            class="flex items-center gap-2 px-5 py-3 text-gray-300 hover:bg-orange-500 hover:text-white transition rounded-r-full">
            📑 Menu
        </a>

        <!-- ORDER -->
        <a href="/admin/order"
            class="flex items-center gap-2 px-5 py-3 text-gray-300 hover:bg-green-500 hover:text-white transition rounded-r-full">
            🛒 Đơn hàng
        </a>


        <!-- CONTACT -->
        <a href="/admin/contact"
            class="flex items-center gap-2 px-5 py-3 text-gray-300 hover:bg-emerald-500 hover:text-white transition rounded-r-full">
            📞 Liên hệ
        </a>

            <!-- USER -->
        <a href="/admin/user"
            class="flex items-center gap-2 px-5 py-3 text-gray-300 hover:bg-pink-500 hover:text-white transition rounded-r-full">
            👤 Người dùng
        </a>
    </nav>

</div>

    <!-- MAIN -->
    <div class="ml-60 flex-1 min-h-screen flex flex-col">

        <!-- HEADER -->
        <div class="bg-white px-6 py-4 flex justify-between items-center shadow">

            <h1 class="font-semibold text-gray-700 text-lg">
                Admin Panel
            </h1>

            <div class="flex items-center gap-4">

                <!-- Trang chủ -->
                <a href="{{ route('site.home') }}"
                    class="flex items-center gap-2 bg-gradient-to-r from-blue-500 to-indigo-500 hover:opacity-90 text-white px-4 py-2 rounded-lg shadow transition">
                    🏠 Trang chủ
                </a>

                <span class="text-gray-500 text-sm">
                    👋 Xin chào Admin
                </span>

            </div>

        </div>

        <!-- CONTENT -->
        <div class="p-6">
            {{ $slot }}
        </div>

    </div>

</body>

</html>
