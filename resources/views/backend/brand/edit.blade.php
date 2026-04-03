<x-layout-admin>

    <h2 class="text-2xl font-bold mb-4">Cập nhật thương hiệu</h2>

    <form action="{{ route('brand.update', $brand->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">

        @csrf
        @method('PUT')

        {{-- NAME --}}
        <div>
            <label class="font-semibold">Tên thương hiệu</label>
            <input type="text" name="name" id="name" value="{{ $brand->name }}"
                class="border w-full px-3 py-2 rounded" required>
        </div>

        {{-- SLUG --}}
        <div>
            <label class="font-semibold">Slug</label>
            <input type="text" name="slug" id="slug" value="{{ $brand->slug }}"
                class="border w-full px-3 py-2 rounded bg-gray-100" readonly>
        </div>

        {{-- SORT --}}
        <div>
            <label class="font-semibold">Thứ tự</label>
            <input type="number" name="sort_order" value="{{ $brand->sort_order }}"
                class="border w-full px-3 py-2 rounded">
        </div>

        {{-- IMAGE --}}
        <div>
            <label class="font-semibold">Hình ảnh</label><br>

            @if ($brand->image)
                <img src="{{ asset('storage/' . $brand->image) }}" class="w-20 h-20 object-cover mb-2 rounded">
            @endif

            <input type="file" name="image" class="border w-full px-3 py-2 rounded">
        </div>

        {{-- DESCRIPTION --}}
        <div>
            <label class="font-semibold">Mô tả</label>
            <textarea name="description" class="border w-full px-3 py-2 rounded">{{ $brand->description }}</textarea>
        </div>

        {{-- STATUS --}}
        <div>
            <label class="font-semibold">Trạng thái</label>
            <select name="status" class="border w-full px-3 py-2 rounded">
                <option value="1" {{ $brand->status == 1 ? 'selected' : '' }}>Hiển thị</option>
                <option value="2" {{ $brand->status == 2 ? 'selected' : '' }}>Ẩn</option>
            </select>
        </div>

        <button class="bg-yellow-500 text-white px-4 py-2 rounded">
            Cập nhật
        </button>

        <a href="{{ route('brand.index') }}" class="bg-gray-400 text-white px-4 py-2 rounded">
            Quay lại
        </a>

    </form>

    {{-- auto slug khi sửa name --}}
    <script>
        const nameInput = document.getElementById('name');
        const slugInput = document.getElementById('slug');

        nameInput.addEventListener('input', function() {
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
