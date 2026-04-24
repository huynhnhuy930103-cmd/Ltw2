<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-900 flex items-center justify-center min-h-screen">

<div class="bg-gray-800 text-white p-8 rounded-2xl shadow-2xl w-full max-w-md">

    <h2 class="text-3xl font-bold text-center mb-2">
        📱 Admin Login
    </h2>

    <p class="text-gray-400 text-center mb-6 text-sm">
        Quản lý shop điện thoại
    </p>

    @if(session('error'))
        <p class="text-red-400 text-center mb-4">{{ session('error') }}</p>
    @endif

    <form method="POST" action="{{ route('admin.handleLogin') }}" class="space-y-4">
        @csrf

        <input type="email" name="email" placeholder="Email"
            class="w-full p-3 rounded-lg bg-gray-700 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
            required>

        <input type="password" name="password" placeholder="Mật khẩu"
            class="w-full p-3 rounded-lg bg-gray-700 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
            required>

        <button type="submit"
            class="w-full py-3 rounded-lg bg-gradient-to-r from-blue-500 to-cyan-400 hover:opacity-90 transition font-semibold">
            Đăng nhập
        </button>
    </form>
</div>

</body>
</html>
