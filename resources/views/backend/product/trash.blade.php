<x-layout-admin>

<div class="min-h-screen bg-gradient-to-br from-red-50 via-gray-50 to-slate-100 p-6">

    <div class="max-w-6xl mx-auto">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-red-600">
                🗑 Thùng rác sản phẩm
            </h2>

            <a href="{{ route('product.index') }}"
               class="px-5 py-2 rounded-lg bg-gray-500 text-white hover:bg-gray-600">
                ← Quay lại
            </a>
        </div>

        <!-- TABLE -->
        <div class="bg-white/80 backdrop-blur rounded-2xl shadow border overflow-hidden">

            <table class="w-full text-center">

                <thead class="bg-red-500 text-white">
                    <tr>
                        <th class="p-3">ID</th>
                        <th class="p-3">Tên sản phẩm</th>
                        <th class="p-3">Trạng thái</th>
                        <th class="p-3">Hành động</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($products as $item)
                        <tr class="border-t hover:bg-red-50 transition">

                            <!-- ID -->
                            <td class="p-3 font-semibold text-gray-700">
                                #{{ $item->id }}
                            </td>

                            <!-- NAME -->
                            <td class="p-3 font-medium text-gray-800">
                                {{ $item->name }}
                            </td>

                            <!-- STATUS -->
                            <td class="p-3">
                                <span class="px-3 py-1 rounded-full text-sm bg-gray-200 text-gray-600">
                                    Đã xóa
                                </span>
                            </td>

                            <!-- ACTION -->
                            <td class="p-3">
                                <div class="flex justify-center gap-2">

                                    <!-- RESTORE -->
                                    <a href="{{ route('admin.product.restore', $item->id) }}"
                                       class="px-3 py-1 rounded-lg bg-green-500 text-white hover:bg-green-600">
                                        ♻ Khôi phục
                                    </a>

                                    <!-- DELETE -->
                                    <form action="{{ route('product.delete', $item->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Xóa vĩnh viễn sản phẩm này?')">
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            class="px-3 py-1 rounded-lg bg-red-500 text-white hover:bg-red-600">
                                            ❌ Xóa luôn
                                        </button>
                                    </form>

                                </div>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="p-6 text-gray-500">
                                🚫 Không có sản phẩm trong thùng rác
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>

        </div>

        <!-- PAGINATION -->
        <div class="mt-6">
            {{ $products->links() }}
        </div>

    </div>

</div>

</x-layout-admin>
