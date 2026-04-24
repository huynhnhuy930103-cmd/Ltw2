<x-layout-admin>

<div class="min-h-screen bg-gradient-to-br from-emerald-100 via-blue-50 to-indigo-100 p-6">

    <div class="max-w-5xl mx-auto bg-white/80 backdrop-blur-md p-8 rounded-2xl shadow-xl border border-gray-200">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-gray-800">
                ➕ Thêm Menu
            </h2>

            <a href="{{ route('menu.index') }}"
               class="px-5 py-2 rounded-lg bg-gray-400 text-white hover:bg-gray-500">
                ← Quay lại
            </a>
        </div>

        <form action="{{ route('menu.store') }}"
              method="POST"
              class="grid grid-cols-2 gap-6">

            @csrf

            <!-- NAME -->
            <div>
                <label class="text-sm text-gray-600">Tên menu</label>
                <input type="text" name="name" value="{{ old('name') }}"
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-emerald-400 outline-none"
                    placeholder="Nhập tên menu...">
            </div>

            <!-- LINK -->
            <div>
                <label class="text-sm text-gray-600">Link</label>
                <input type="text" name="link" value="{{ old('link') }}"
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-emerald-400 outline-none"
                    placeholder="/san-pham hoặc URL">
            </div>

            <!-- POSITION -->
            <div>
                <label class="text-sm text-gray-600">Vị trí</label>
                <select name="position"
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-emerald-400">
                    <option value="mainmenu">Main Menu</option>
                    <option value="footermenu">Footer Menu</option>
                </select>
            </div>

            <!-- TYPE -->
            <div>
                <label class="text-sm text-gray-600">Type</label>
                <select name="type"
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-emerald-400">
                    <option value="custom">Custom</option>
                    <option value="category">Category</option>
                    <option value="brand">Brand</option>
                    <option value="topic">Topic</option>
                    <option value="page">Page</option>
                </select>
            </div>

            <!-- SORT -->
            <div>
                <label class="text-sm text-gray-600">Thứ tự</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', 1) }}"
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-emerald-400">
            </div>

            <!-- STATUS -->
            <div>
                <label class="text-sm text-gray-600">Trạng thái</label>
                <select name="status"
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-emerald-400">
                    <option value="1">✔ Hiển thị</option>
                    <option value="0">⛔ Ẩn</option>
                </select>
            </div>

            <!-- BUTTON -->
            <div class="col-span-2 flex justify-end gap-3 mt-4">

                <a href="{{ route('menu.index') }}"
                   class="px-5 py-2 rounded-lg bg-gray-400 text-white hover:bg-gray-500">
                    Hủy
                </a>

                <button
                    class="px-6 py-2 rounded-lg text-white bg-gradient-to-r from-blue-500 to-indigo-500 hover:scale-105 transition shadow-lg">
                    💾 Lưu Menu
                </button>

            </div>

        </form>

    </div>

</div>

</x-layout-admin>
