<x-layout-admin>

    <h2 class="text-2xl font-bold mb-6">Cập nhật user</h2>

    {{-- BUTTON QUAY VỀ --}}
    <div class="mb-4">
        <a href="{{ route('user.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded">
            ← Quay về
        </a>
    </div>

    <form action="{{ route('user.update', $user->id) }}" method="POST" class="space-y-4 bg-white p-6 rounded shadow">

        @csrf
        @method('PUT')

        <div>
            <label class="block font-medium mb-1">Tên</label>
            <input name="name" value="{{ $user->name }}" class="border w-full p-2 rounded">
        </div>

        <div>
            <label class="block font-medium mb-1">Email</label>
            <input name="email" value="{{ $user->email }}" class="border w-full p-2 rounded">
        </div>

        <div>
            <label class="block font-medium mb-1">Số điện thoại</label>
            <input name="phone" value="{{ $user->phone ?? '' }}" class="border w-full p-2 rounded">
        </div>

        <div>
            <label class="block font-medium mb-1">Username</label>
            <input name="username" value="{{ $user->username ?? '' }}" class="border w-full p-2 rounded">
        </div>

        <div>
            <label class="block font-medium mb-1">Mật khẩu</label>
            <input type="password" name="password" placeholder="Để trống nếu không đổi"
                class="border w-full p-2 rounded">
        </div>

        <div>
            <label class="block font-medium mb-1">Địa chỉ</label>
            <input name="address" value="{{ $user->address ?? '' }}" class="border w-full p-2 rounded">
        </div>

        <div>
            <label class="block font-medium mb-1">Ảnh</label>
            <input name="image" value="{{ $user->image ?? '' }}" class="border w-full p-2 rounded">
        </div>

        <div>
            <label class="block font-medium mb-1">Quyền</label>
            <select name="roles" class="border w-full p-2 rounded">
                <option value="user" {{ $user->roles == 'user' ? 'selected' : '' }}>User</option>
                <option value="admin" {{ $user->roles == 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
        </div>

        <div>
            <label class="block font-medium mb-1">Trạng thái</label>
            <select name="status" class="border w-full p-2 rounded">
                <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>Active</option>
                <option value="2" {{ $user->status == 2 ? 'selected' : '' }}>Hidden</option>
            </select>
        </div>

        <button class="bg-green-600 text-white px-4 py-2 rounded">
            Cập nhật
        </button>

    </form>

</x-layout-admin>
