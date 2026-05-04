<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">

<div class="bg-white p-8 rounded shadow w-96">

    <h2 class="text-2xl font-bold mb-6 text-center">Đăng nhập Admin</h2>

    @if(session('error'))
        <div class="text-red-500 mb-3">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.login.dologin') }}">
        @csrf

        <input type="text" name="username" placeholder="Username"
            class="w-full border p-2 mb-3 rounded">

        <input type="password" name="password" placeholder="Password"
            class="w-full border p-2 mb-3 rounded">

        <button class="w-full bg-blue-600 text-white py-2 rounded">
            Login
        </button>
    </form>

</div>

</body>
</html>
