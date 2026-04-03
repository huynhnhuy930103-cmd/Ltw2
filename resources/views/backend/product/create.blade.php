<x-layout-admin>

    <h2 class="text-2xl font-bold mb-6">Thêm sản phẩm</h2>

    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data"
        class="space-y-5 bg-white p-6 rounded-xl shadow">
        @csrf

        {{-- tên --}}
        <div>
            <label class="block mb-1 font-semibold">Tên sản phẩm</label>
            <input type="text" name="name" id="name"
                class="border w-full px-3 py-2 rounded focus:ring-2 focus:ring-green-400 outline-none">
        </div>

        {{-- slug --}}
        <div>
            <label class="block mb-1 font-semibold">Slug</label>
            <input type="text" name="slug" id="slug" readonly
                class="border w-full px-3 py-2 rounded bg-gray-100">
        </div>

        {{-- danh mục --}}
        <div>
            <label class="block mb-1 font-semibold">Danh mục</label>
            <select name="category_id" class="border w-full px-3 py-2 rounded">
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- thương hiệu --}}
        <div>
            <label class="block mb-1 font-semibold">Thương hiệu</label>
            <select name="brand_id" class="border w-full px-3 py-2 rounded">
                @foreach ($brands as $br)
                    <option value="{{ $br->id }}">{{ $br->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- giá nhập --}}
        <div>
            <label class="block mb-1 font-semibold">Giá nhập</label>
            <input type="number" name="price_buy" class="border w-full px-3 py-2 rounded">
        </div>

        {{-- giá bán --}}
        <div>
            <label class="block mb-1 font-semibold">Giá bán</label>
            <input type="number" name="price_sale" class="border w-full px-3 py-2 rounded">
        </div>

        {{-- số lượng --}}
        <div>
            <label class="block mb-1 font-semibold">Số lượng</label>
            <input type="number" name="qty" class="border w-full px-3 py-2 rounded">
        </div>

        {{-- hình ảnh --}}
        <div>
            <label class="block mb-1 font-semibold">Hình ảnh</label>
            <input type="file" name="image" class="border w-full px-3 py-2 rounded">
        </div>

        {{-- mô tả chi tiết --}}
        <div>
            <label class="block mb-1 font-semibold">Chi tiết</label>
            <textarea name="detail" rows="4" class="border w-full px-3 py-2 rounded"></textarea>
        </div>

        {{-- mô tả ngắn --}}
        <div>
            <label class="block mb-1 font-semibold">Mô tả</label>
            <textarea name="description" rows="3" class="border w-full px-3 py-2 rounded"></textarea>
        </div>

        {{-- trạng thái --}}
        <div>
            <label class="block mb-1 font-semibold">Trạng thái</label>
            <select name="status" class="border w-full px-3 py-2 rounded">
                <option value="1">Hiển thị</option>
                <option value="0">Ẩn</option>
            </select>
        </div>

        {{-- nút --}}
        <div class="flex gap-3">
            <button class="bg-green-600 text-white px-5 py-2 rounded hover:bg-green-700">
                Lưu
            </button>

            <a href="{{ route('product.index') }}" class="text-blue-500 hover:underline">
                ← Quay lại
            </a>
        </div>

    </form>

    {{-- 🔥 JS slug --}}
    <script>
        document.getElementById('name').addEventListener('input', function() {
            let name = this.value;

            let slug = name
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
