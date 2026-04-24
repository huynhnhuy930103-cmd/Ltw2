<x-layout-admin>

<div class="min-h-screen bg-gradient-to-br from-slate-100 via-blue-50 to-indigo-100 p-6">

    <div class="max-w-4xl mx-auto bg-white/80 backdrop-blur-md p-8 rounded-2xl shadow-xl border border-gray-200">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-gray-800">
                ➕ Thêm Topic mới
            </h2>

            <a href="{{ route('topic.index') }}"
               class="px-5 py-2 rounded-lg bg-gray-400 text-white hover:bg-gray-500">
                ← Quay lại
            </a>
        </div>

        <!-- FORM -->
        <form action="{{ route('topic.store') }}"
              method="POST"
              class="grid grid-cols-2 gap-6">

            @csrf

            <!-- NAME -->
            <div class="col-span-2">
                <label class="text-sm text-gray-600">Tên Topic</label>
                <input type="text" name="name" value="{{ old('name') }}"
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400 outline-none"
                    placeholder="Nhập tên topic...">

                @if ($errors->has('name'))
                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('name') }}</p>
                @endif
            </div>

            <!-- SORT -->
            <div>
                <label class="text-sm text-gray-600">Thứ tự</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', 1) }}"
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400">
            </div>

            <!-- STATUS -->
            <div>
                <label class="text-sm text-gray-600">Trạng thái</label>
                <select name="status"
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400">
                    <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>✔ Hiển thị</option>
                    <option value="2" {{ old('status') == 2 ? 'selected' : '' }}>⛔ Ẩn</option>
                </select>
            </div>

            <!-- DESCRIPTION -->
            <div class="col-span-2">
                <label class="text-sm text-gray-600">Mô tả</label>
                <textarea name="description" rows="4"
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400"
                    placeholder="Nhập mô tả topic...">{{ old('description') }}</textarea>
            </div>

            <!-- BUTTON -->
            <div class="col-span-2 flex justify-end gap-3 mt-4">

                <a href="{{ route('topic.index') }}"
                   class="px-5 py-2 rounded-lg bg-gray-400 text-white hover:bg-gray-500">
                    Hủy
                </a>

                <button
                    class="px-6 py-2 rounded-lg text-white bg-gradient-to-r from-indigo-500 to-blue-500 hover:scale-105 transition shadow-lg">
                    💾 Lưu Topic
                </button>

            </div>

        </form>

    </div>

</div>

</x-layout-admin>
