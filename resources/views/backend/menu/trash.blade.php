<x-layout-admin>

    <h2 class="text-2xl font-bold mb-4">Thùng rác Menu</h2>

    <a href="{{ route('menu.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">
        ← Quay lại
    </a>

    <table class="w-full border mt-4">
        <thead class="bg-gray-100">
            <tr>
                <th class="border p-2">ID</th>
                <th class="border p-2">Tên</th>
                <th class="border p-2">Chức năng</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($menus as $item)
                <tr>
                    <td class="border p-2">{{ $item->id }}</td>
                    <td class="border p-2">{{ $item->name }}</td>

                    <td class="border p-2 flex gap-2">

                        <a href="{{ route('admin.menu.restore', $item->id) }}" class="text-green-600">♻ Restore</a>

                        <form action="{{ route('admin.menu.delete', $item->id) }}" method="POST"
                            onsubmit="return confirm('Xóa vĩnh viễn?')">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600">❌ Delete</button>
                        </form>

                    </td>
                </tr>
            @empty
                <tr>
                    <td class="text-center p-4" colspan="3">Không có dữ liệu</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</x-layout-admin>
