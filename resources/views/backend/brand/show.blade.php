<x-layout-admin>

<div class="min-h-screen bg-gradient-to-br from-slate-100 via-blue-50 to-indigo-100 p-6">

    <div class="max-w-6xl mx-auto">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-gray-800">
                🏷 Chi tiết thương hiệu #{{ $brand->id }}
            </h2>

            <div class="flex gap-2">
                <a href="{{ route('brand.index') }}"
                   class="px-4 py-2 rounded-lg bg-gray-400 text-white hover:bg-gray-500 transition">
                    ← Quay lại
                </a>

                <a href="{{ route('brand.edit', $brand->id) }}"
                   class="px-4 py-2 rounded-lg bg-yellow-500 text-white hover:bg-yellow-600 transition">
                    ✏ Sửa
                </a>
            </div>
        </div>

        <!-- MAIN -->
        <div class="grid grid-cols-3 gap-6">

            <!-- IMAGE -->
            <div class="col-span-1 bg-white/80 backdrop-blur p-4 rounded-2xl shadow border">
                @if($brand->image)
                    <img src="{{ asset('storage/' . $brand->image) }}"
                         class="w-full h-72 object-cover rounded-xl shadow">
                @else
                    <div class="w-full h-72 flex items-center justify-center bg-gray-100 rounded-xl text-gray-400">
                        No Image
                    </div>
                @endif
            </div>

            <!-- INFO -->
            <div class="col-span-2 bg-white/80 backdrop-blur p-6 rounded-2xl shadow border space-y-4">

                <h3 class="text-2xl font-bold text-gray-800">
                    {{ $brand->name }}
                </h3>

                <p class="text-sm text-gray-500">
                    {{ $brand->slug }}
                </p>

                <!-- STATUS + ORDER -->
                <div class="flex gap-3 text-sm">
                    <span class="px-3 py-1 rounded-full text-white
                        {{ $brand->status == 1 ? 'bg-green-500' : 'bg-gray-400' }}">
                        {{ $brand->status == 1 ? '✔ Hiển thị' : '⛔ Ẩn' }}
                    </span>

                    <span class="px-3 py-1 bg-blue-100 text-blue-600 rounded-full">
                        🔢 Thứ tự: {{ $brand->sort_order }}
                    </span>
                </div>

                <!-- DESCRIPTION -->
                <div class="mt-4">
                    <h4 class="font-bold text-gray-700 mb-2">📄 Mô tả</h4>
                    <p class="text-gray-600 leading-relaxed">
                        {{ $brand->description ?? '---' }}
                    </p>
                </div>

                <!-- META -->
                <div class="text-sm text-gray-500 mt-4 space-y-1">
                    <p>📅 Ngày tạo: {{ $brand->created_at }}</p>
                    <p>♻ Cập nhật: {{ $brand->updated_at }}</p>
                </div>

            </div>

        </div>

        <!-- ACTION -->
        <div class="mt-6 flex gap-3">

            <a href="{{ route('brand.edit', $brand->id) }}"
               class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition">
                ✏ Sửa
            </a>

            <form action="{{ route('brand.destroy', $brand->id) }}"
                  method="POST"
                  onsubmit="return confirm('Xóa thương hiệu này?')">

                @csrf
                @method('DELETE')

                <button class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition">
                    🗑 Xóa
                </button>

            </form>

        </div>

    </div>

</div>

</x-layout-admin>
