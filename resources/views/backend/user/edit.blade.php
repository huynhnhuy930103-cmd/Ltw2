<x-layout-admin>

<div class="min-h-screen bg-gradient-to-br from-slate-100 via-blue-50 to-indigo-100 p-6">

    <div class="max-w-5xl mx-auto bg-white/80 backdrop-blur-md p-8 rounded-2xl shadow-xl border border-gray-200">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-gray-800">
                ✏️ Cập nhật user #{{ $user->id }}
            </h2>

            <a href="{{ route('user.index') }}"
               class="px-5 py-2 rounded-lg bg-gray-400 text-white hover:bg-gray-500 transition">
                ← Quay về
            </a>
        </div>

        <!-- FORM -->
        <form action="{{ route('user.update', $user->id) }}"
              method="POST"
              class="grid grid-cols-2 gap-6">

            @csrf
            @method('PUT')

            <!-- NAME -->
            <div>
                <label class="text-sm text-gray-600">Tên</label>
                <input name="name"
                       value="{{ $user->name }}"
                       class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400 outline-none">
            </div>

            <!-- EMAIL -->
            <div>
                <label class="text-sm text-gray-600">Email</label>
                <input name="email"
                       value="{{ $user->email }}"
                       class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400 outline-none">
            </div>

            <!-- PHONE -->
            <div>
                <label class="text-sm text-gray-600">Số điện thoại</label>
                <input name="phone"
                       value="{{ $user->phone ?? '' }}"
                       class="w-full border px-4 py-2 rounded-lg">
            </div>

            <!-- USERNAME -->
            <div>
                <label class="text-sm text-gray-600">Username</label>
                <input name="username"
                       value="{{ $user->username ?? '' }}"
                       class="w-full border px-4 py-2 rounded-lg">
            </div>

            <!-- PASSWORD -->
            <div class="col-span-2">
                <label class="text-sm text-gray-600">Mật khẩu (để trống nếu không đổi)</label>
                <input type="password"
                       name="password"
                       class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400">
            </div>

            <!-- ADDRESS -->
            <div class="col-span-2">
                <label class="text-sm text-gray-600">Địa chỉ</label>
                <input name="address"
                       value="{{ $user->address ?? '' }}"
                       class="w-full border px-4 py-2 rounded-lg">
            </div>

            <!-- IMAGE -->
            <div class="col-span-2">
                <label class="text-sm text-gray-600">Ảnh</label>
                <input name="image"
                       value="{{ $user->image ?? '' }}"
                       class="w-full border px-4 py-2 rounded-lg">
            </div>

            <!-- ROLE -->
            <div>
                <label class="text-sm text-gray-600">Quyền</label>
                <select name="roles"
                        class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400">

                    <option value="user" {{ $user->roles == 'user' ? 'selected' : '' }}>
                        User
                    </option>

                    <option value="admin" {{ $user->roles == 'admin' ? 'selected' : '' }}>
                        Admin
                    </option>

                </select>
            </div>

            <!-- STATUS -->
            <div>
                <label class="text-sm text-gray-600">Trạng thái</label>
                <select name="status"
                        class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400">

                    <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>
                        Active
                    </option>

                    <option value="2" {{ $user->status == 2 ? 'selected' : '' }}>
                        Hidden
                    </option>

                </select>
            </div>

            <!-- BUTTON -->
            <div class="col-span-2 flex justify-end gap-3 mt-4">

                <a href="{{ route('user.index') }}"
                   class="px-5 py-2 rounded-lg bg-gray-400 text-white hover:bg-gray-500 transition">
                    Hủy
                </a>

                <button
                    class="px-6 py-2 rounded-lg text-white bg-gradient-to-r from-green-500 to-emerald-500 hover:scale-105 transition shadow-lg">
                    💾 Cập nhật
                </button>

            </div>

        </form>

    </div>

</div>

</x-layout-admin>
