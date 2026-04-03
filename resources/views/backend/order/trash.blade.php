<x-layout-admin>

    <h2 class="text-2xl font-bold mb-4">Thùng rác đơn hàng</h2>

    <a href="{{ route('order.index') }}" class="text-blue-500">
        ← Quay lại
    </a>

    <table class="w-full border mt-4">

        <thead class="bg-gray-100">
            <tr>
                <th class="border p-2">ID</th>
                <th class="border p-2">Tên</th>
                <th class="border p-2">Hành động</th>
            </tr>
        </thead>

        <tbody>
            @forelse($orders as $item)
                <tr>

                    <td class="border p-2">{{ $item->id }}</td>
                    <td class="border p-2">{{ $item->name }}</td>

                    <td class="border p-2 flex gap-2">

                        <a href="{{ route('admin.order.restore', $item->id) }}" class="text-green-600">
                            ♻ Khôi phục
                        </a>

                        <form action="{{ route('admin.order.delete', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600">
                                🗑 Xóa
                            </button>
                        </form>

                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center p-3">
                        Không có dữ liệu
                    </td>
                </tr>
            @endforelse
        </tbody>

    </table>

</x-layout-admin>
