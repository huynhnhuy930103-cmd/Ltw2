<x-layout-admin title="Quản lý sản phẩm">
<div class="flex bg-gray-100 min-h-screen">

    <!-- MAIN -->
    <div class="flex-1 ml-0 md:ml-60">

        <!-- HEADER -->
        <div class="bg-white px-6 py-4 flex justify-between items-center shadow">
            <h3 class="text-xl font-semibold">📦 Quản lý sản phẩm</h3>
            <div class="text-sm">
                Admin | <a href="/" class="text-blue-500 hover:underline">Trang chủ</a>
            </div>
        </div>

        <!-- CONTENT -->
        <div class="p-6">

            <!-- SEARCH + BUTTON -->
            <div class="flex flex-col sm:flex-row justify-between gap-3 mb-4">
                <input
                    type="text"
                    placeholder="🔍 Tìm sản phẩm..."
                    class="px-3 py-2 border rounded-lg w-full sm:w-64 focus:outline-none focus:ring-2 focus:ring-blue-400"
                >

                <div class="flex gap-2">
                    <a href="#" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg">
                        ➕ Thêm
                    </a>
                    <a href="#" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg">
                        🗑️ Thùng rác
                    </a>
                </div>
            </div>

            <!-- TABLE -->
            <div class="bg-white rounded-xl shadow overflow-hidden">
                <table class="w-full text-center">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="p-3">ID</th>
                            <th class="p-3">Hình</th>
                            <th class="p-3">Tên</th>
                            <th class="p-3">Giá</th>
                            <th class="p-3">Trạng thái</th>
                            <th class="p-3">Hành động</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($products as $item)
                        <tr class="border-t hover:bg-gray-50">
                            <td class="p-3">{{ $item->id }}</td>

                            <td class="p-3">
                                <img
                                    src="{{ asset('images/products/' . $item->image) }}"
                                    class="w-14 h-14 object-cover rounded-lg mx-auto"
                                >
                            </td>

                            <td class="p-3">{{ $item->name }}</td>

                            <td class="p-3 text-green-600 font-semibold">
                                {{ number_format($item->price_buy) }} đ
                            </td>

                            <td class="p-3">
                                @if($item->status == 1)
                                    <span class="bg-yellow-500 text-white text-xs px-3 py-1 rounded-full">
                                        Ẩn
                                    </span>
                                @else
                                    <span class="bg-green-500 text-white text-xs px-3 py-1 rounded-full">
                                        Hiện
                                    </span>
                                @endif
                            </td>

                            <td class="p-3 space-x-2">
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
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
</x-layout-admin>
