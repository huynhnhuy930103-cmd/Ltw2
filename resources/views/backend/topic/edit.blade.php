<x-layout-admin>

<div class="min-h-screen bg-gradient-to-br from-slate-100 via-blue-50 to-indigo-100 p-6">

    <div class="max-w-4xl mx-auto bg-white/80 backdrop-blur-md p-8 rounded-2xl shadow-xl border border-gray-200">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-gray-800">
                ✏️ Cập nhật Topic {{ $topic->id }}
            </h2>

            <a href="{{ route('topic.index') }}"
               class="px-5 py-2 rounded-lg bg-gray-400 text-white hover:bg-gray-500">
                ← Quay lại
            </a>
        </div>

        <!-- FORM -->
        <form action="{{ route('topic.update', $topic->id) }}"
              method="POST"
              class="space-y-5">

            @csrf
            @method('PUT')

            <!-- NAME -->
            <div>
                <label class="text-sm text-gray-600">Tên Topic</label>
                <input type="text" name="name"
                    value="{{ $topic->name }}"
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400 outline-none">
            </div>

            <!-- SORT -->
            <div>
                <label class="text-sm text-gray-600">Sắp xếp</label>
                <input type="number" name="sort_order"
                    value="{{ $topic->sort_order }}"
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400">
            </div>

            <!-- DESCRIPTION -->
            <div>
                <label class="text-sm text-gray-600">Mô tả</label>
                <textarea name="description" rows="4"
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400">{{ $topic->description }}</textarea>
            </div>

            <!-- STATUS -->
            <div>
                <label class="text-sm text-gray-600">Trạng thái</label>
                <select name="status"
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400">
                    <option value="1" {{ $topic->status == 1 ? 'selected' : '' }}>
                        ✔ Hiển thị
                    </option>
                    <option value="2" {{ $topic->status == 2 ? 'selected' : '' }}>
                        ⛔ Ẩn
                    </option>
                </select>
            </div>

            <!-- BUTTON -->
            <div class="flex justify-end gap-3 mt-6">

                <a href="{{ route('topic.index') }}"
                   class="px-5 py-2 rounded-lg bg-gray-400 text-white hover:bg-gray-500">
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
