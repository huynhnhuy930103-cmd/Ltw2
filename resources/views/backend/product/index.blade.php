<x-layout-admin>

    <h2 class="text-3xl font-bold mb-6 text-gray-800">📦 Quản lý sản phẩm</h2>

    {{-- 🔍 FORM FILTER --}}
    <form method="GET" action="{{ route('product.index') }}"
        class="mb-6 flex flex-wrap gap-3 bg-white p-4 rounded-xl shadow">

        <input type="text" name="keyword" placeholder="Tìm sản phẩm"
            value="{{ request('keyword') }}"
            class="border border-gray-300 px-4 py-2 rounded-lg focus:ring-2 focus:ring-blue-400 outline-none">

        <select name="category_id"
            class="border border-gray-300 px-4 py-2 rounded-lg focus:ring-2 focus:ring-blue-400">
            <option value="">Danh mục</option>
            @foreach ($categories as $cat)
                <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>
                    {{ $cat->name }}
                </option>
            @endforeach
        </select>

        <select name="brand_id"
            class="border border-gray-300 px-4 py-2 rounded-lg focus:ring-2 focus:ring-blue-400">
            <option value="">Thương hiệu</option>
            @foreach ($brands as $br)
                <option value="{{ $br->id }}" {{ request('brand_id') == $br->id ? 'selected' : '' }}>
                    {{ $br->name }}
                </option>
            @endforeach
        </select>

        <button class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg shadow">
            Lọc
        </button>

        <a href="{{ route('product.index') }}"
            class="bg-gray-400 hover:bg-gray-500 text-white px-5 py-2 rounded-lg">
            Reset
        </a>
    </form>

    {{-- 🔗 BUTTON --}}
    <div class="mb-6 flex gap-3">
        <a href="{{ route('product.create') }}"
            class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg shadow">
            ➕ Thêm mới
        </a>

        <a href="{{ route('admin.product.trash') }}"
            class="bg-red-500 hover:bg-red-600 text-white px-5 py-2 rounded-lg shadow">
            🗑 Thùng rác
        </a>
    </div>

    {{-- 📋 TABLE --}}
    <div class="bg-white rounded-xl shadow overflow-hidden">
        <table class="w-full text-sm text-gray-700">
            <thead class="bg-gray-200 text-gray-700 uppercase text-xs">
                <tr>
                    <th class="p-3 text-left">ID</th>
                    <th class="p-3 text-left">Tên</th>
                    <th class="p-3 text-left">Danh mục</th>
                    <th class="p-3 text-left">Thương hiệu</th>
                    <th class="p-3 text-center">Trạng thái</th>
                    <th class="p-3 text-center">Chức năng</th>
                </tr>
            </thead>

            <tbody class="divide-y">
                @forelse ($products as $item)
                    <tr class="hover:bg-gray-50 transition">

                        <td class="p-3">{{ $item->id }}</td>

                        <td class="p-3 font-medium text-gray-800">
                            {{ $item->name }}
                        </td>

                        <td class="p-3">{{ $item->category->name ?? '' }}</td>

                        <td class="p-3">{{ $item->brand->name ?? '' }}</td>

                        <td class="p-3 text-center">
                            <span
                                class="px-3 py-1 text-xs font-semibold rounded-full
                                {{ $item->status ? 'bg-green-100 text-green-600' : 'bg-gray-200 text-gray-600' }}">
                                {{ $item->status ? 'Hiển thị' : 'Ẩn' }}
                            </span>
                        </td>

                        <td class="p-3">
                            <div class="flex gap-3 items-center justify-center text-lg">

                                <a href="{{ route('product.show', $item->id) }}"
                                    class="text-blue-500 hover:text-blue-700">
                                    👁 Chi tiết
                                </a>

                               <a
                                    href="{{ route('admin.product.edit', $item->id) }}"
                                    class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded"
                                >
                                    Sửa
                                </a>

                                <form action="{{ route('admin.product.delete', $item->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        onclick="return confirm('Xóa sản phẩm này?')"
                                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded"
                                    >
                                        Xóa
                                    </button>
                                </form>

                            </div>
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center p-6 text-gray-500">
                            😢 Không có sản phẩm
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- 📄 PAGINATION --}}
    <div class="mt-6">
        {{ $products->withQueryString()->links() }}
    </div>

</x-layout-admin>
