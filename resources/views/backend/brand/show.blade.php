<x-layout-admin>

    <h2 class="text-2xl font-bold mb-4">Chi tiết thương hiệu</h2>

    <div class="mb-4">
        <a href="{{ route('brand.index') }}"
           class="bg-gray-500 text-white px-4 py-2 rounded">
            ← Quay lại
        </a>
    </div>

    <div class="grid grid-cols-2 gap-6">

        {{-- LEFT: IMAGE --}}
        <div class="border p-4 rounded">

            <h3 class="font-bold mb-2">Hình ảnh</h3>

            @if($brand->image)
                <img src="{{ asset('storage/' . $brand->image) }}"
                     class="w-full h-64 object-cover rounded">
            @else
                <p class="text-gray-500">Không có hình ảnh</p>
            @endif

        </div>

        {{-- RIGHT: INFO --}}
        <div class="border p-4 rounded space-y-3">

            <div>
                <strong>ID:</strong> {{ $brand->id }}
            </div>

            <div>
                <strong>Tên:</strong> {{ $brand->name }}
            </div>

            <div>
                <strong>Slug:</strong> {{ $brand->slug }}
            </div>

            <div>
                <strong>Thứ tự:</strong> {{ $brand->sort_order }}
            </div>

            <div>
                <strong>Trạng thái:</strong>
                <span class="px-2 py-1 rounded text-white
                    {{ $brand->status == 1 ? 'bg-green-500' : 'bg-gray-400' }}">
                    {{ $brand->status == 1 ? 'Hiển thị' : 'Ẩn' }}
                </span>
            </div>

            <div>
                <strong>Mô tả:</strong>
                <p class="mt-1 text-gray-700">
                    {{ $brand->description }}
                </p>
            </div>

            <div>
                <strong>Ngày tạo:</strong>
                {{ $brand->created_at }}
            </div>

            <div>
                <strong>Cập nhật:</strong>
                {{ $brand->updated_at }}
            </div>

        </div>

    </div>

    {{-- ACTION --}}
    <div class="mt-6 flex gap-3">

        <a href="{{ route('brand.edit', $brand->id) }}"
           class="bg-yellow-500 text-white px-4 py-2 rounded">
            ✏ Sửa
        </a>

        <form action="{{ route('brand.destroy', $brand->id) }}"
              method="POST"
              onsubmit="return confirm('Xóa thương hiệu này?')">

            @csrf
            @method('DELETE')

            <button class="bg-red-500 text-white px-4 py-2 rounded">
                🗑 Xóa
            </button>

        </form>

    </div>

</x-layout-admin>