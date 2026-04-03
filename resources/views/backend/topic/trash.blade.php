<x-layout-admin>

    <h2 class="text-2xl font-bold mb-4">Thùng rác Topic</h2>

    <a href="{{ route('topic.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">
        ← Quay lại
    </a>

    <table class="w-full border mt-4">
        <thead class="bg-gray-100">
            <tr>
                <th class="border p-2">ID</th>
                <th class="border p-2">Tên</th>
                <th class="border p-2">Slug</th>
                <th class="border p-2">Action</th>
            </tr>
        </thead>

        <tbody>
            @forelse($topics as $item)
                <tr>
                    <td class="border p-2">{{ $item->id }}</td>
                    <td class="border p-2">{{ $item->name }}</td>
                    <td class="border p-2">{{ $item->slug }}</td>

                    <td class="border p-2 flex gap-2">

                        <a href="{{ route('admin.topic.restore', $item->id) }}">♻ Restore</a>

                        <form action="{{ route('admin.topic.delete', $item->id) }}" method="POST"
                            onsubmit="return confirm('Xóa vĩnh viễn?')">
                            @csrf
                            @method('DELETE')
                            <button>❌</button>
                        </form>

                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center p-4">
                        Thùng rác trống
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</x-layout-admin>
