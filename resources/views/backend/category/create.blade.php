<x-layout-admin>

<div class="min-h-screen bg-gradient-to-br from-slate-100 via-blue-50 to-indigo-100 p-6">

    <div class="max-w-4xl mx-auto bg-white/80 backdrop-blur-md p-8 rounded-2xl shadow-xl border border-gray-200">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-gray-800">
                ➕ Thêm danh mục mới
            </h2>

            <a href="{{ route('category.index') }}"
               class="px-5 py-2 rounded-lg bg-gray-400 text-white hover:bg-gray-500">
                ← Quay lại
            </a>
        </div>

        <!-- FORM -->
        <form method="POST" action="{{ route('category.store') }}" enctype="multipart/form-data"
              class="grid grid-cols-2 gap-6">

            @csrf

            {{-- NAME --}}
            <div class="col-span-2">
                <label class="text-sm text-gray-600">Tên danh mục</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400 outline-none"
                    placeholder="Nhập tên danh mục...">

                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- SLUG --}}
            <div class="col-span-2">
                <label class="text-sm text-gray-600">Slug</label>
                <input type="text" name="slug" id="slug" value="{{ old('slug') }}"
                    class="w-full border px-4 py-2 rounded-lg bg-gray-100"
                    readonly>
            </div>

            {{-- IMAGE --}}
            <div class="col-span-2">
                <label class="text-sm text-gray-600">Hình ảnh</label>
                <input type="file" name="image"
                    class="w-full border px-4 py-2 rounded-lg">
            </div>

            {{-- PARENT --}}
            <div>
                <label class="text-sm text-gray-600">Danh mục cha</label>
                <select name="parent_id"
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400">

                    <option value="0">-- Không có --</option>

                    @foreach ($parents as $item)
                        <option value="{{ $item->id }}">
                            {{ $item->name }}
                        </option>
                    @endforeach

                </select>
            </div>

            {{-- SORT --}}
            <div>
                <label class="text-sm text-gray-600">Thứ tự</label>
                <input type="number" name="sort_order"
                    value="{{ old('sort_order', 1) }}"
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400">
            </div>

            {{-- DESCRIPTION --}}
            <div class="col-span-2">
                <label class="text-sm text-gray-600">Mô tả</label>
                <textarea name="description" rows="4"
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400"
                    placeholder="Nhập mô tả...">{{ old('description') }}</textarea>
            </div>

            {{-- STATUS --}}
            <div class="col-span-2">
                <label class="text-sm text-gray-600">Trạng thái</label>
                <select name="status"
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400">

                    <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>✔ Hiển thị</option>
                    <option value="2" {{ old('status') == 2 ? 'selected' : '' }}>⛔ Ẩn</option>

                </select>
            </div>

            {{-- BUTTON --}}
            <div class="col-span-2 flex justify-end gap-3 mt-4">

                <a href="{{ route('category.index') }}"
                   class="px-5 py-2 rounded-lg bg-gray-400 text-white hover:bg-gray-500">
                    Hủy
                </a>

                <button class="px-6 py-2 rounded-lg text-white bg-gradient-to-r from-indigo-500 to-blue-500 hover:scale-105 transition shadow-lg">
                    💾 Lưu danh mục
                </button>

            </div>

        </form>

    </div>

</div>

{{-- AUTO SLUG --}}
<script>
document.getElementById('name').addEventListener('input', function () {
    let slug = this.value
        .toLowerCase()
        .normalize('NFD')
        .replace(/[\u0300-\u036f]/g, '')
        .replace(/đ/g, 'd')
        .replace(/[^a-z0-9 ]/g, '')
        .replace(/\s+/g, '-')
        .replace(/-+/g, '-');

    document.getElementById('slug').value = slug;
});
</script>

</x-layout-admin>
