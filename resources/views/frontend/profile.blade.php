<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Thông tin tài khoản</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<div class="max-w-3xl mx-auto mt-10 bg-white shadow-lg rounded-xl p-6">

    <h1 class="text-2xl font-bold mb-6 text-blue-600">
        👤 Thông tin tài khoản
    </h1>

    @php
        $user = session('user_site');
    @endphp

    @if($user)

        <div class="space-y-4">

            <div class="flex items-center gap-4">
                <div class="w-20 h-20 bg-gray-200 rounded-full flex items-center justify-center text-2xl">
                    👤
                </div>

                <div>
                    <p class="text-lg font-semibold">{{ $user->name }}</p>
                    <p class="text-gray-500">{{ $user->email }}</p>
                </div>
            </div>

            <hr>

            <div class="grid grid-cols-2 gap-4">

                <div>
                    <p class="text-gray-500">Username</p>
                    <p class="font-medium">{{ $user->username }}</p>
                </div>

                <div>
                    <p class="text-gray-500">Số điện thoại</p>
                    <p class="font-medium">{{ $user->phone ?? 'Chưa cập nhật' }}</p>
                </div>

                <div>
                    <p class="text-gray-500">Địa chỉ</p>
                    <p class="font-medium">{{ $user->address ?? 'Chưa cập nhật' }}</p>
                </div>

                <div>
                    <p class="text-gray-500">Vai trò</p>
                    <p class="font-medium">{{ $user->roles }}</p>
                </div>

            </div>

            <div class="mt-6 flex gap-3">

                <a href="/"
                   class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                    ⬅ Về trang chủ
                </a>

                <form action="/dang-xuat" method="post">
    @csrf
    <button type="submit"
        class="block w-full text-left px-4 py-2 hover:bg-red-100 text-red-600">
        🚪 Đăng xuất
    </button>
</form>

            </div>

        </div>

    @else

        <p class="text-red-500">
            Bạn chưa đăng nhập!
        </p>

        <a href="{{ route('site.login') }}"
           class="inline-block mt-4 px-4 py-2 bg-blue-500 text-white rounded">
            Đăng nhập
        </a>

    @endif

</div>

</body>
</html>
