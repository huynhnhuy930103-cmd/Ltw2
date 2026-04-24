<x-layout-admin>

<div class="min-h-screen bg-gradient-to-br from-slate-100 via-blue-50 to-indigo-100 p-6">

    <!-- HEADER -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold text-gray-800">📦 Quản lý đơn hàng</h2>

        <div class="flex gap-3">
            <a href="{{ route('order.create') }}"
               class="bg-gradient-to-r from-blue-500 to-indigo-500 text-white px-5 py-2 rounded-lg shadow-lg hover:scale-105 transition">
                ➕ Tạo đơn
            </a>

            <a href="{{ route('admin.order.trash') }}"
               class="bg-gradient-to-r from-red-500 to-pink-500 text-white px-5 py-2 rounded-lg shadow-lg hover:scale-105 transition">
                🗑 Thùng rác
            </a>
        </div>
    </div>

    <!-- SEARCH -->
    <div class="bg-white/70 backdrop-blur-md p-4 rounded-2xl shadow-lg mb-6 border border-gray-200">

        <form method="GET" class="flex gap-2">
            <input type="text"
                   name="keyword"
                   value="{{ request('keyword') }}"
                   placeholder="🔍 Tìm đơn hàng..."
                   class="border px-4 py-2 rounded-lg w-64 focus:ring-2 focus:ring-indigo-400 outline-none">

            <button class="bg-indigo-500 text-white px-4 py-2 rounded-lg hover:bg-indigo-600">
                Tìm
            </button>
        </form>

    </div>

    <!-- TABLE -->
    <div class="bg-white/80 backdrop-blur-md rounded-2xl shadow-xl overflow-hidden border border-gray-200">

        <table class="w-full text-sm">

            <thead class="bg-gradient-to-r from-indigo-500 to-blue-500 text-white uppercase text-xs">
                <tr>
                    <th class="p-4 text-left">ID</th>
                    <th class="p-4 text-left">Khách hàng</th>
                    <th class="p-4 text-left">Liên hệ</th>
                    <th class="p-4 text-center">Trạng thái</th>
                    <th class="p-4 text-center">Hành động</th>
                </tr>
            </thead>

            <tbody class="divide-y">

                @forelse($orders as $item)
                <tr class="hover:bg-indigo-50 transition">

                    <!-- ID -->
                    <td class="p-4 font-semibold text-gray-600">
                        {{ $item->id }}
                    </td>

                    <!-- CUSTOMER -->
                    <td class="p-4">
                        <div class="font-semibold text-gray-800">
                            {{ $item->name }}
                        </div>
                        <div class="text-sm text-gray-500">
                            {{ $item->email }}
                        </div>
                    </td>

                    <!-- CONTACT -->
                    <td class="p-4 text-gray-600">
                        {{ $item->phone }}
                    </td>

                    <!-- STATUS -->
                    <td class="p-4 text-center">
                        @if($item->status == 1)
                            <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-xs">
                                ● Hoàn tất
                            </span>
                        @else
                            <span class="bg-yellow-100 text-yellow-600 px-3 py-1 rounded-full text-xs">
                                ● Chờ xử lý
                            </span>
                        @endif
                    </td>

                    <!-- ACTION -->
                    <td class="p-4">
                        <div class="flex gap-2 justify-center">

                            <a href="{{ route('order.show', $item->id) }}"
                               class="bg-blue-500 text-white px-3 py-1 rounded-lg hover:bg-blue-600">
                                Xem
                            </a>

                            <a href="{{ route('order.edit', $item->id) }}"
                               class="bg-yellow-400 px-3 py-1 rounded-lg hover:bg-yellow-500">
                                Sửa
                            </a>

                            <form action="{{ route('order.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button
                                    onclick="return confirm('Xóa đơn này?')"
                                    class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600">
                                    Xóa
                                </button>
                            </form>

                        </div>
                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center p-6 text-gray-400">
                        😢 Không có đơn hàng
                    </td>
                </tr>
                @endforelse

            </tbody>

        </table>
    </div>

    <!-- PAGINATION -->
    <div class="mt-6">
        {{ $orders->links() }}
    </div>

</div>

</x-layout-admin>
