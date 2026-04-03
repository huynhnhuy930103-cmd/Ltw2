<x-layout-admin>

    <h2 class="text-2xl font-bold mb-6">Sửa danh mục</h2>

    <form method="POST"
          action="{{ route('category.update', $category->id) }}"
          enctype="multipart/form-data"
          class="max-w-2xl bg-white p-6 rounded-xl shadow">

        @csrf
        @method('PUT')

        {{-- NAME --}}
        <div class="mb-4">
            <label class="block mb-1 font-medium">Tên danh mục</label>
            <input type="text"
                   name="name"
                   id="name"
                   value="{{ $category->name }}"
                   class="w-full border rounded px-3 py-2"
                   required>
        </div>

        {{-- SLUG (auto) --}}
        <div class="mb-4">
            <label class="block mb-1 font-medium">Slug</label>
            <input type="text"
                   name="slug"
                   id="slug"
                   value="{{ $category->slug }}"
                   class="w-full border rounded px-3 py-2 bg-gray-100"
                   readonly>
        </div>

        {{-- IMAGE --}}
        <div class="mb-4">
            <label class="block mb-1 font-medium">Hình ảnh</label>

            @if ($category->image)
                <img src="{{ asset('storage/' . $category->image) }}"
                     class="h-20 mb-2 rounded">
            @endif

            <input type="file"
                   name="image"
                   class="w-full border rounded px-3 py-2">
        </div>

        {{-- PARENT --}}
        <div class="mb-4">
            <label class="block mb-1 font-medium">Danh mục cha</label>

            <select name="parent_id"
                    class="w-full border rounded px-3 py-2">

                <option value="0">-- Không có --</option>

                @foreach ($parents as $item)
                    <option value="{{ $item->id }}"
                        {{ $category->parent_id == $item->id ? 'selected' : '' }}>
                        {{ $item->name }}
                    </option>
                @endforeach

            </select>
        </div>

        {{-- SORT --}}
        <div class="mb-4">
            <label class="block mb-1 font-medium">Thứ tự</label>
            <input type="number"
                   name="sort_order"
                   value="{{ $category->sort_order }}"
                   class="w-full border rounded px-3 py-2">
        </div>

        {{-- DESCRIPTION --}}
        <div class="mb-4">
            <label class="block mb-1 font-medium">Mô tả</label>
            <textarea name="description"
                      rows="4"
                      class="w-full border rounded px-3 py-2">{{ $category->description }}</textarea>
        </div>

        {{-- STATUS --}}
        <div class="mb-4">
            <label class="block mb-1 font-medium">Trạng thái</label>

            <select name="status"
                    class="w-full border rounded px-3 py-2">

                <option value="1" {{ $category->status == 1 ? 'selected' : '' }}>
                    Hiển thị
                </option>

                <option value="0" {{ $category->status == 0 ? 'selected' : '' }}>
                    Ẩn
                </option>

            </select>
        </div>

        {{-- BUTTON --}}
        <div class="flex gap-2">

            <button class="bg-blue-600 text-white px-4 py-2 rounded">
                Cập nhật
            </button>

            <a href="{{ route('category.index') }}"
               class="bg-gray-400 text-white px-4 py-2 rounded">
                Hủy
            </a>

        </div>

    </form>

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