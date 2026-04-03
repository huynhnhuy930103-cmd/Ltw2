<x-layout-admin>

    <h2 class="text-2xl font-bold mb-6">Cập nhật sản phẩm</h2>

    <form action="{{ route('product.update', $product->id) }}" method="POST" class="space-y-5 bg-white p-6 rounded-xl shadow">
        @csrf
        @method('PUT')

        {{-- tên --}}
        <div>
            <label class="block mb-1 font-semibold">Tên sản phẩm</label>
            <input type="text" name="name" id="name"
                value="{{ $product->name }}"
                class="border w-full px-3 py-2 rounded">
        </div>

        {{-- slug --}}
        <div>
            <label class="block mb-1 font-semibold">Slug</label>
            <input type="text" name="slug" id="slug"
                value="{{ $product->slug }}"
                readonly
                class="border w-full px-3 py-2 rounded bg-gray-100">
        </div>

        {{-- danh mục --}}
        <div>
            <label>Danh mục</label>
            <select name="category_id" class="border w-full px-3 py-2 rounded">
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}"
                        {{ $product->category_id == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- thương hiệu --}}
        <div>
            <label>Thương hiệu</label>
            <select name="brand_id" class="border w-full px-3 py-2 rounded">
                @foreach($brands as $br)
                    <option value="{{ $br->id }}"
                        {{ $product->brand_id == $br->id ? 'selected' : '' }}>
                        {{ $br->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- giá nhập --}}
        <div>
            <label>Giá nhập</label>
            <input type="number" name="price_buy"
                value="{{ $product->price_buy }}"
                class="border w-full px-3 py-2 rounded">
        </div>

        {{-- giá bán --}}
        <div>
            <label>Giá bán</label>
            <input type="number" name="price_sale"
                value="{{ $product->price_sale }}"
                class="border w-full px-3 py-2 rounded">
        </div>

        {{-- số lượng --}}
        <div>
            <label>Số lượng</label>
            <input type="number" name="qty"
                value="{{ $product->qty }}"
                class="border w-full px-3 py-2 rounded">
        </div>

        {{-- ảnh --}}
        <div>
            <label>Link hình ảnh</label>
            <input type="text" name="image"
                value="{{ $product->image }}"
                class="border w-full px-3 py-2 rounded">
        </div>

        {{-- chi tiết --}}
        <div>
            <label>Chi tiết</label>
            <textarea name="detail" class="border w-full px-3 py-2 rounded">{{ $product->detail }}</textarea>
        </div>

        {{-- mô tả --}}
        <div>
            <label>Mô tả</label>
            <textarea name="description" class="border w-full px-3 py-2 rounded">{{ $product->description }}</textarea>
        </div>

        {{-- trạng thái --}}
        <div>
            <label>Trạng thái</label>
            <select name="status" class="border w-full px-3 py-2 rounded">
                <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Hiển thị</option>
                <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>Ẩn</option>
            </select>
        </div>

        {{-- nút --}}
        <div class="flex gap-3">
            <button class="bg-green-600 text-white px-5 py-2 rounded">
                Cập nhật
            </button>

            <a href="{{ route('product.index') }}" class="text-blue-500">
                ← Quay lại
            </a>
        </div>

    </form>

    {{-- JS slug --}}
    <script>
        document.getElementById('name').addEventListener('input', function () {
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