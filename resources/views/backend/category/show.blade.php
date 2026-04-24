<x-layout-admin>

<div class="min-h-screen bg-gradient-to-br from-slate-100 via-blue-50 to-indigo-100 p-6">

    <div class="max-w-6xl mx-auto bg-white/80 backdrop-blur-md p-8 rounded-2xl shadow-xl border border-gray-200">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-gray-800">
                📂 Chi tiết danh mục {{ $category->id }}
            </h2>

            <a href="{{ route('category.index') }}"
               class="px-5 py-2 rounded-lg bg-gray-400 text-white hover:bg-gray-500">
                ← Quay lại
            </a>
        </div>

        <div class="grid grid-cols-2 gap-8">

            <!-- IMAGE -->
            <div class="bg-white rounded-xl shadow p-4 border">

                <h3 class="font-semibold text-gray-700 mb-3">Hình ảnh</h3>

                @if ($category->image)
                    <img src="{{ asset('storage/' . $category->image) }}"
                         class="w-full h-72 object-cover rounded-xl shadow">
                @else
                    <div class="h-72 flex items-center justify-center bg-gray-100 rounded-xl text-gray-400">
                        🚫 Không có hình ảnh
                    </div>
                @endif

            </div>

            <!-- INFO -->
            <div class="bg-white rounded-xl shadow p-6 border space-y-4">

                <div class="flex justify-between">
                    <span class="text-gray-500">Tên</span>
                    <span class="font-semibold text-gray-800">{{ $category->name }}</span>
                </div>

                <div class="flex justify-between">
                    <span class="text-gray-500">Slug</span>
                    <span class="text-gray-700">{{ $category->slug }}</span>
                </div>

                <div class="flex justify-between">
                    <span class="text-gray-500">Danh mục cha</span>
                    <span class="text-gray-700">
                        {{ $category->parent->name ?? 'Không có' }}
                    </span>
                </div>

                <div class="flex justify-between">
                    <span class="text-gray-500">Thứ tự</span>
                    <span class="bg-gray-100 px-3 py-1 rounded-full text-sm">
                        {{ $category->sort_order }}
                    </span>
                </div>

                <div class="flex justify-between items-center">
                    <span class="text-gray-500">Trạng thái</span>

                    @if($category->status == 1)
                        <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-sm">
                            ● Hiển thị
                        </span>
                    @else
                        <span class="bg-gray-200 text-gray-600 px-3 py-1 rounded-full text-sm">
                            ● Ẩn
                        </span>
                    @endif
                </div>

                <div>
                    <span class="text-gray-500">Mô tả</span>
                    <p class="mt-2 text-gray-700 bg-gray-100 p-3 rounded-lg">
                        {{ $category->description ?? 'Không có mô tả' }}
                    </p>
                </div>

                <div class="flex justify-between text-sm text-gray-500">
                    <span>Tạo: {{ $category->created_at }}</span>
                    <span>Cập nhật: {{ $category->updated_at }}</span>
                </div>

            </div>

        </div>

        <!-- ACTION -->
        <div class="mt-8 flex gap-3">

            <a href="{{ route('category.edit', $category->id) }}"
               class="px-5 py-2 rounded-lg bg-gradient-to-r from-yellow-400 to-orange-400 text-white hover:scale-105 transition shadow">
                ✏ Sửa
            </a>

            <form action="{{ route('category.destroy', $category->id) }}" method="POST"
                onsubmit="return confirm('Xóa danh mục này?')">
                @csrf
                @method('DELETE')

                <button
                    class="px-5 py-2 rounded-lg bg-gradient-to-r from-red-500 to-pink-500 text-white hover:scale-105 transition shadow">
                    🗑 Xóa
                </button>
            </form>

        </div>

    </div>

</div>

</x-layout-admin>
