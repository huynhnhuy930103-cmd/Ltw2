<x-layout-admin>

<div class="min-h-screen bg-gradient-to-br from-slate-100 via-blue-50 to-indigo-100 p-6">

    <div class="max-w-5xl mx-auto bg-white/80 backdrop-blur-md p-8 rounded-2xl shadow-xl border border-gray-200">

        <!-- TITLE -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-gray-800">
                ✏️ Sửa danh mục {{ $category->id }}
            </h2>

            <a href="{{ route('category.index') }}"
               class="px-5 py-2 rounded-lg bg-gray-400 text-white hover:bg-gray-500">
                ← Quay lại
            </a>
        </div>

        <form method="POST"
              action="{{ route('category.update', $category->id) }}"
              enctype="multipart/form-data"
              class="grid grid-cols-2 gap-6">

            @csrf
            @method('PUT')

            <!-- NAME -->
            <div>
                <label class="text-sm text-gray-600">Tên danh mục</label>
                <input type="text"
                       name="name"
                       id="name"
                       value="{{ $category->name }}"
                       class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400 outline-none"
                       required>
            </div>

            <!-- SLUG -->
            <div>
                <label class="text-sm text-gray-600">Slug</label>
                <input type="text"
                       name="slug"
                       id="slug"
                       value="{{ $category->slug }}"
                       class="w-full border px-4 py-2 rounded-lg bg-gray-100"
                       readonly>
            </div>

            <!-- IMAGE -->
            <div class="col-span-2">
                <label class="text-sm text-gray-600">Hình ảnh</label>

                <div class="flex items-center gap-4 mt-2">

                    @if ($category->image)
                        <img src="{{ asset('storage/' . $category->image) }}"
                             class="h-24 w-24 object-cover rounded-xl shadow border">
                    @else
                        <div class="h-24 w-24 flex items-center justify-center bg-gray-100 rounded-xl text-gray-400">
                            No img
                        </div>
                    @endif

                    <input type="file"
                           name="image"
                           class="flex-1 border px-4 py-2 rounded-lg">
                </div>
            </div>

            <!-- PARENT -->
            <div>
                <label class="text-sm text-gray-600">Danh mục cha</label>

                <select name="parent_id"
                        class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400">

                    <option value="0">-- Không có --</option>

                    @foreach ($parents as $item)
                        <option value="{{ $item->id }}"
                            {{ $category->parent_id == $item->id ? 'selected' : '' }}>
                            {{ $item->name }}
                        </option>
                    @endforeach

                </select>
            </div>

            <!-- SORT -->
            <div>
                <label class="text-sm text-gray-600">Thứ tự</label>
                <input type="number"
                       name="sort_order"
                       value="{{ $category->sort_order }}"
                       class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400">
            </div>

            <!-- STATUS -->
            <div>
                <label class="text-sm text-gray-600">Trạng thái</label>

                <select name="status"
                        class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400">

                    <option value="1" {{ $category->status == 1 ? 'selected' : '' }}>
                        ✔ Hiển thị
                    </option>

                    <option value="0" {{ $category->status == 0 ? 'selected' : '' }}>
                        ⛔ Ẩn
                    </option>

                </select>
            </div>

            <!-- DESCRIPTION -->
            <div class="col-span-2">
                <label class="text-sm text-gray-600">Mô tả</label>
                <textarea name="description"
                          rows="4"
                          class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400 outline-none">{{ $category->description }}</textarea>
            </div>

            <!-- BUTTON -->
            <div class="col-span-2 flex justify-end gap-3 mt-4">

                <a href="{{ route('category.index') }}"
                   class="px-5 py-2 rounded-lg bg-gray-400 text-white hover:bg-gray-500">
                    Hủy
                </a>

                <button
                    class="px-6 py-2 rounded-lg text-white bg-gradient-to-r from-blue-500 to-indigo-500 hover:scale-105 transition shadow-lg">
                    💾 Cập nhật
                </button>

            </div>

        </form>

    </div>

</div>

{{-- AUTO SLUG --}}
<script>
    const nameInput = document.getElementById('name');
    const slugInput = document.getElementById('slug');

    nameInput.addEventListener('input', function () {
        let slug = this.value
            .toLowerCase()
            .normalize('NFD')
            .replace(/[\u0300-\u036f]/g, '')
            .replace(/[^a-z0-9\s-]/g, '')
            .trim()
            .replace(/\s+/g, '-');

        slugInput.value = slug;
    });
</script>

</x-layout-admin>
