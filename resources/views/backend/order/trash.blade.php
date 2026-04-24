<x-layout-admin>

<div class="min-h-screen bg-gradient-to-br from-slate-100 via-red-50 to-pink-100 p-6">

    <div class="max-w-5xl mx-auto bg-white/80 backdrop-blur-md p-8 rounded-2xl shadow-xl border border-red-200">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-red-600">
                🗑 Thùng rác đơn hàng
            </h2>

            <a href="{{ route('order.index') }}"
               class="px-5 py-2 rounded-lg bg-gray-400 text-white hover:bg-gray-500">
                ← Quay lại
            </a>
        </div>

        <!-- WARNING -->
        <div class="mb-6 p-4 bg-red-100 text-red-600 rounded-lg text-sm">
            ⚠️ Các đơn hàng trong thùng rác có thể được khôi phục hoặc xóa vĩnh viễn.
        </div>

        <!-- TABLE -->
        <div class="bg-white/90 rounded-xl shadow overflow-hidden border border-gray-200">

            <table class="w-full text-sm">

                <thead class="bg-gradient-to-r from-red-500 to-pink-500 text-white uppercase text-xs">
                    <tr>
                        <th class="p-4 text-left">ID</th>
                        <th class="p-4 text-left">Tên khách</th>
                        <th class="p-4 text-center">Hành động</th>
                    </tr>
                </thead>

                <tbody class="divide-y">

                    @forelse($orders as $item)
                    <tr class="hover:bg-red-50 transition">

                        <td class="p-4 font-semibold text-gray-600">
                            #{{ $item->id }}
                        </td>

                        <td class="p-4 font-medium text-gray-800">
                            {{ $item->name }}
                        </td>

                        <td class="p-4">
                            <div class="flex justify-center gap-3">

                                <!-- RESTORE -->
                                <a href="{{ route('admin.order.restore', $item->id) }}"
                                   class="bg-green-500 text-white px-3 py-1 rounded-lg hover:bg-green-600 shadow">
                                    ♻ Khôi phục
                                </a>

                                <!-- DELETE FOREVER -->
                                <form action="{{ route('admin.order.delete', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        onclick="return confirm('Xóa vĩnh viễn đơn này?')"
                                        class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600 shadow">
                                        🗑 Xóa vĩnh viễn
                                    </button>
                                </form>

                            </div>
                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center p-6 text-gray-400">
                            😢 Thùng rác trống
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

</div>

</x-layout-admin>
