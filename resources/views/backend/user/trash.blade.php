<x-layout-admin>

    <h2 class="text-2xl font-bold mb-4">Thùng rác user</h2>

    {{-- QUAY LẠI --}}
    <a href="{{ route('user.index') }}" class="text-blue-500 hover:underline">
        ← Quay lại
    </a>

    <table class="w-full border mt-4">

        <thead class="bg-gray-100">
            <tr>
                <th class="border p-2">ID</th>
                <th class="border p-2">Tên</th>
                <th class="border p-2">Email</th>
                <th class="border p-2">Hành động</th>
            </tr>
        </thead>

        <tbody>

            @forelse ($users as $item)
                <tr class="hover:bg-gray-50">

                    <td class="border p-2">{{ $item->id }}</td>
                    <td class="border p-2">{{ $item->name }}</td>
                    <td class="border p-2">{{ $item->email }}</td>

                    <td class="border p-2">
                        <div class="flex gap-3 items-center">

                            {{-- ♻ RESTORE (FIXED ROUTE: cần id trên URL) --}}
                            <form action="{{ route('admin.user.restore', $item->id) }}" method="POST">

                                @csrf

                                <button type="submit" class="text-green-600 hover:underline">
                                    ♻ Restore
                                </button>

                            </form>

                            {{-- 🗑 DELETE (force delete) --}}
                            <form action="{{ route('admin.user.delete', $item->id) }}" method="POST"
                                onsubmit="return confirm('Xóa vĩnh viễn user này?')">

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="text-red-600 hover:underline">
                                    🗑 Delete
                                </button>

                            </form>

                        </div>
                    </td>

                </tr>
            @empty

                <tr>
                    <td colspan="4" class="text-center p-3 text-gray-500">
                        Không có dữ liệu
                    </td>
                </tr>
            @endforelse

        </tbody>

    </table>

</x-layout-admin>
