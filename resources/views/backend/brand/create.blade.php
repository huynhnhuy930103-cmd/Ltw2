<x-layout-admin>

    <h2 class="text-2xl font-bold mb-4">Thêm thương hiệu</h2>

    <form action="{{ route('brand.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">

        @csrf

        {{-- NAME --}}
        <div>
            <label class="font-semibold">Tên thương hiệu</label>
            <input type="text" name="name" id="name" class="border w-full px-3 py-2 rounded" required>
        </div>

        {{-- SLUG (auto) --}}
        <div>
            <label class="font-semibold">Slug</label>
            <input type="text" name="slug" id="slug" class="border w-full px-3 py-2 rounded bg-gray-100"
                readonly>
        </div>

        {{-- SORT --}}
        <div>
            <label class="font-semibold">Thứ tự</label>
            <input type="number" name="sort_order" value="0" class="border w-full px-3 py-2 rounded">
        </div>

        {{-- IMAGE --}}
        <div>
            <label class="font-semibold">Hình ảnh</label>
            <input type="file" name="image" class="border w-full px-3 py-2 rounded">
        </div>

        {{-- DESCRIPTION --}}
        <div>
            <label class="font-semibold">Mô tả</label>
            <textarea name="description" class="border w-full px-3 py-2 rounded"></textarea>
        </div>

        {{-- STATUS --}}
        <div>
            <label class="font-semibold">Trạng thái</label>
            <select name="status" class="border w-full px-3 py-2 rounded">
                <option value="1">Hiển thị</option>
                <option value="2">Ẩn</option>
            </select>
        </div>

        <button class="bg-blue-500 text-white px-4 py-2 rounded">
            Lưu
        </button>

        <a href="{{ route('brand.index') }}" class="bg-gray-400 text-white px-4 py-2 rounded">
            Quay lại
        </a>

    </form>

    {{-- SLUG AUTO SCRIPT --}}
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
