<x-layout-admin>

    <h2 class="text-2xl font-bold mb-6">Thêm user mới</h2>

    {{-- BUTTON QUAY VỀ --}}
    <div class="mb-4">
        <a href="{{ route('user.index') }}"
           class="bg-gray-600 text-white px-4 py-2 rounded">
            ← Quay về
        </a>
    </div>

    <form action="{{ route('user.store') }}" method="POST"
          class="space-y-4 bg-white p-6 rounded shadow">

        @csrf

        <div>
            <label class="block font-medium mb-1">Tên</label>
            <input name="name" class="border w-full p-2 rounded">
        </div>

        <div>
            <label class="block font-medium mb-1">Email</label>
            <input name="email" class="border w-full p-2 rounded">
        </div>

        <div>
            <label class="block font-medium mb-1">Số điện thoại</label>
            <input name="phone" class="border w-full p-2 rounded">
        </div>

        <div>
            <label class="block font-medium mb-1">Username</label>
            <input name="username" class="border w-full p-2 rounded">
        </div>

        <div>
            <label class="block font-medium mb-1">Mật khẩu</label>
            <input type="password" name="password" class="border w-full p-2 rounded">
        </div>

        <div>
            <label class="block font-medium mb-1">Địa chỉ</label>
            <input name="address" class="border w-full p-2 rounded">
        </div>

        <div>
            <label class="block font-medium mb-1">Ảnh</label>
            <input name="image" class="border w-full p-2 rounded">
        </div>

        <div>
            <label class="block font-medium mb-1">Quyền</label>
            <select name="roles" class="border w-full p-2 rounded">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
        </div>

        <div>
            <label class="block font-medium mb-1">Trạng thái</label>
            <select name="status" class="border w-full p-2 rounded">
                <option value="1">Active</option>
                <option value="2">Hidden</option>
            </select>
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">
            ➕ Tạo user
        </button>

    </form>

</x-layout-admin>