<x-layout-admin>

    <h2 class="text-2xl font-bold mb-6">Chi tiết sản phẩm</h2>

    <div class="bg-white p-6 rounded-xl shadow grid grid-cols-2 gap-6">

        {{-- 📸 HÌNH ẢNH --}}
        <div>
            @if ($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" class="w-full h-80 object-cover rounded-lg border">
            @else
                <div class="w-full h-80 flex items-center justify-center bg-gray-100 rounded">
                    Không có ảnh
                </div>
            @endif
        </div>

        {{-- 📋 THÔNG TIN --}}
        <div class="space-y-3">

            <p><strong>ID:</strong> {{ $product->id }}</p>

            <p><strong>Tên:</strong> {{ $product->name }}</p>

            <p><strong>Slug:</strong> {{ $product->slug }}</p>

            <p><strong>Danh mục:</strong> {{ $product->category->name ?? '---' }}</p>

            <p><strong>Thương hiệu:</strong> {{ $product->brand->name ?? '---' }}</p>

            <p><strong>Giá nhập:</strong> {{ number_format($product->price_buy) }} đ</p>

            <p><strong>Giá bán:</strong>
                {{ $product->price_sale ? number_format($product->price_sale) . ' đ' : '---' }}
            </p>

            <p><strong>Số lượng:</strong> {{ $product->qty }}</p>

            <p><strong>Trạng thái:</strong>
                <span
                    class="px-3 py-1 rounded text-white
                {{ $product->status ? 'bg-green-500' : 'bg-gray-400' }}">
                    {{ $product->status ? 'Hiển thị' : 'Ẩn' }}
                </span>
            </p>

            <p><strong>Ngày tạo:</strong> {{ $product->created_at }}</p>

        </div>

    </div>

    {{-- 📝 MÔ TẢ --}}
    <div class="bg-white p-6 rounded-xl shadow mt-6 space-y-3">

        <div>
            <strong>Chi tiết:</strong>
            <p class="mt-1 text-gray-700">
                {{ $product->detail }}
            </p>
        </div>

        <div>
            <strong>Mô tả:</strong>
            <p class="mt-1 text-gray-700">
                {{ $product->description }}
            </p>
        </div>

    </div>

    {{-- 🔙 BUTTON --}}
    <div class="mt-6 flex gap-3">
        <a href="{{ route('product.index') }}" class="text-blue-500 hover:underline">
            ← Quay lại
        </a>

        <a href="{{ route('product.edit', $product->id) }}"
            class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
            ✏ Chỉnh sửa
        </a>
    </div>

</x-layout-admin>
