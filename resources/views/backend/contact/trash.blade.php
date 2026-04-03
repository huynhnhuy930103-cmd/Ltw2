<x-layout-admin>

    <h2 class="text-2xl font-bold mb-4">Thùng rác Contact</h2>
    <a href="{{ route('contact.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">
        ← Quay lại
    </a>

    <table class="w-full border">
        <thead class="bg-gray-100">
            <tr>
                <th class="border p-2">ID</th>
                <th class="border p-2">Tên</th>
                <th class="border p-2">Email</th>
                <th class="border p-2">Phone</th>
                <th class="border p-2">Action</th>
            </tr>
        </thead>

        <tbody>
            @forelse($contacts as $item)
                <tr>
                    <td class="border p-2">{{ $item->id }}</td>
                    <td class="border p-2">{{ $item->name }}</td>
                    <td class="border p-2">{{ $item->email }}</td>
                    <td class="border p-2">{{ $item->phone }}</td>

                    <td class="border p-2 flex gap-2">

                        <a href="{{ route('admin.contact.restore', $item->id) }}"
                            onclick="return confirm('Khôi phục?')" class="text-green-600">
                            Restore
                        </a>

                        <form action="{{ route('admin.contact.delete', $item->id) }}" method="POST"
                            onsubmit="return confirm('Xóa vĩnh viễn?')">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600">Delete</button>
                        </form>

                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center p-4">
                        Không có dữ liệu
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</x-layout-admin>
