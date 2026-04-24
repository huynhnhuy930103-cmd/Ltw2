<x-layout-admin>

<div class="min-h-screen bg-gradient-to-br from-slate-100 via-blue-50 to-indigo-100 p-6">

    <!-- HEADER -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold text-gray-800">📦 Quản lý sản phẩm</h2>

        <div class="flex gap-3">
            <a href="{{ route('product.create') }}"
                class="bg-gradient-to-r from-blue-500 to-indigo-500 text-white px-5 py-2 rounded-lg shadow-lg hover:scale-105 transition">
                ➕ Thêm mới
            </a>

            <a href="{{ route('admin.product.trash') }}"
                class="bg-gradient-to-r from-red-500 to-pink-500 text-white px-5 py-2 rounded-lg shadow-lg hover:scale-105 transition">
                🗑 Thùng rác
            </a>
        </div>
    </div>

    <!-- FILTER -->
    <form method="GET" action="{{ route('product.index') }}"
        class="mb-6 flex flex-wrap gap-3 bg-white/70 backdrop-blur-md p-4 rounded-2xl shadow-lg border border-gray-200">

        <input type="text" name="keyword" placeholder="🔍 Tìm sản phẩm"
            value="{{ request('keyword') }}"
            class="border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400 outline-none">

        <select name="category_id"
            class="border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400">
            <option value="">Danh mục</option>
            @foreach ($categories as $cat)
                <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>
                    {{ $cat->name }}
                </option>
            @endforeach
        </select>

        <select name="brand_id"
            class="border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400">
            <option value="">Thương hiệu</option>
            @foreach ($brands as $br)
                <option value="{{ $br->id }}" {{ request('brand_id') == $br->id ? 'selected' : '' }}>
                    {{ $br->name }}
                </option>
            @endforeach
        </select>

        <button class="bg-indigo-500 text-white px-5 py-2 rounded-lg shadow hover:bg-indigo-600">
            Lọc
        </button>

        <a href="{{ route('product.index') }}"
            class="bg-gray-400 text-white px-5 py-2 rounded-lg hover:bg-gray-500">
            Reset
        </a>
    </form>

    <!-- TABLE -->
    <div class="bg-white/80 backdrop-blur-md rounded-2xl shadow-xl overflow-hidden border border-gray-200">

        <table class="w-full text-sm">

            <thead class="bg-gradient-to-r from-indigo-500 to-blue-500 text-white text-xs uppercase">
                <tr>
                    <th class="p-4 text-left">ID</th>
                    <th class="p-4 text-left">Hình ảnh</th>
                    <th class="p-4 text-left">Tên</th>
                    <th class="p-4 text-left">Danh mục</th>
                    <th class="p-4 text-left">Thương hiệu</th>
                    <th class="p-4 text-center">Trạng thái</th>
                    <th class="p-4 text-center">Chức năng</th>
                </tr>
            </thead>

            <tbody class="divide-y">

                @forelse ($products as $item)
                <tr class="hover:bg-indigo-50 transition">

                    <td class="p-4 font-semibold text-gray-600">
                        {{ $item->id }}
                    </td>

                    <!-- 👇 CỘT ẢNH -->
                    <td class="p-4">
                        @if ($item->image)
                                    <img src="{{ Storage::url($item->image) }}" alt="{{ $item->name }}" class="w-16 h-16 object-cover">
                                @endif
                    </td>

                    <td class="p-4 font-semibold text-gray-800">
                        {{ $item->name }}
                    </td>

                    <td class="p-4 text-gray-600">
                        {{ $item->category->name ?? '' }}
                    </td>

                    <td class="p-4 text-gray-600">
                        {{ $item->brand->name ?? '' }}
                    </td>

                    <td class="p-4 text-center">
                        @if($item->status)
                            <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-xs">
                                ● Hiển thị
                            </span>
                        @else
                            <span class="bg-gray-200 text-gray-600 px-3 py-1 rounded-full text-xs">
                                ● Ẩn
                            </span>
                        @endif
                    </td>

                    <td class="p-4">
                        <div class="flex gap-2 justify-center">

                            <a href="{{ route('product.show', $item->id) }}"
                                class="bg-blue-500 text-white px-3 py-1 rounded-lg hover:bg-blue-600">
                                Xem
                            </a>

                            <a href="{{ route('product.edit', $item->id) }}"
                                class="bg-yellow-400 px-3 py-1 rounded-lg hover:bg-yellow-500">
                                Sửa
                            </a>

                            <form action="{{ route('product.delete', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button
                                    onclick="return confirm('Xóa sản phẩm này?')"
                                    class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600">
                                    Xóa
                                </button>
                            </form>

                        </div>
                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center p-6 text-gray-400">
                        😢 Không có sản phẩm
                    </td>
                </tr>
                @endforelse

            </tbody>

        </table>
    </div>

    <!-- PAGINATION -->
    <div class="mt-6">
        {{ $products->withQueryString()->links() }}
    </div>

</div>

</x-layout-admin>
