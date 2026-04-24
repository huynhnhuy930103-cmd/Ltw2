<x-layout-admin>

<div class="min-h-screen bg-gradient-to-br from-slate-100 via-blue-50 to-indigo-100 p-6">

    <div class="max-w-5xl mx-auto bg-white/80 backdrop-blur-md p-8 rounded-2xl shadow-xl border">

        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-gray-800">➕ Thêm User</h2>

            <a href="{{ route('user.index') }}"
               class="px-5 py-2 rounded-lg bg-gray-400 text-white hover:bg-gray-500">
                ← Quay lại
            </a>
        </div>

        <form action="{{ route('user.store') }}" method="POST" class="grid grid-cols-2 gap-6">
            @csrf

            <input name="name" placeholder="Tên"
                class="border px-4 py-2 rounded-lg">

            <input name="email" placeholder="Email"
                class="border px-4 py-2 rounded-lg">

            <input name="phone" placeholder="SĐT"
                class="border px-4 py-2 rounded-lg">

            <input name="username" placeholder="Username"
                class="border px-4 py-2 rounded-lg">

            <input type="password" name="password" placeholder="Mật khẩu"
                class="border px-4 py-2 rounded-lg">

            <input name="address" placeholder="Địa chỉ"
                class="border px-4 py-2 rounded-lg col-span-2">

            <select name="roles" class="border px-4 py-2 rounded-lg">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>

            <select name="status" class="border px-4 py-2 rounded-lg">
                <option value="1">Active</option>
                <option value="2">Hidden</option>
            </select>

            <div class="col-span-2 flex justify-end">
                <button class="bg-gradient-to-r from-blue-500 to-indigo-500 text-white px-6 py-2 rounded-lg">
                    ➕ Tạo user
                </button>
            </div>

        </form>

    </div>

</div>

</x-layout-admin>
