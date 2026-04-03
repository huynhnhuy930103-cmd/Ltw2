<x-layout-admin>

    <h2 class="text-2xl font-bold mb-4">Quản lý đơn hàng</h2>

    {{-- BUTTON --}}
    <div class="mb-4 flex gap-3">

        <a href="{{ route('order.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
            ➕ Tạo đơn
        </a>

        <a href="{{ route('admin.order.trash') }}" class="bg-red-500 text-white px-4 py-2 rounded">
            🗑 Thùng rác
        </a>

    </div>

    {{-- TABLE --}}
    <table class="w-full border">

        <thead class="bg-gray-100">
            <tr>
                <th class="border p-2">ID</th>
                <th class="border p-2">Tên</th>
                <th class="border p-2">SĐT</th>
                <th class="border p-2">Email</th>
                <th class="border p-2">Trạng thái</th>
                <th class="border p-2">Hành động</th>
            </tr>
        </thead>

        <tbody>
            @forelse($orders as $item)
                <tr>

                    <td class="border p-2">{{ $item->id }}</td>

                    <td class="border p-2">{{ $item->name }}</td>

                    <td class="border p-2">{{ $item->phone }}</td>

                    <td class="border p-2">{{ $item->email }}</td>

                    <td class="border p-2 text-center">
                        <span
                            class="px-2 py-1 rounded text-white
                            {{ $item->status == 1 ? 'bg-green-500' : 'bg-gray-400' }}">
                            {{ $item->status == 1 ? 'Hoàn tất' : 'Chờ xử lý' }}
                        </span>
                    </td>

                    <td class="border p-2">

                        <div class="flex gap-2">

                            <a href="{{ route('order.show', $item->id) }}">👁</a>

                            <a href="{{ route('order.edit', $item->id) }}">✏</a>

                            <form action="{{ route('order.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600">🗑</button>
                            </form>

                        </div>

                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center p-3">
                        Không có đơn hàng
                    </td>
                </tr>
            @endforelse
        </tbody>

    </table>

</x-layout-admin>
