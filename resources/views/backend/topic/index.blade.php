<x-layout-admin>

    <h2 class="text-2xl font-bold mb-4">Quản lý Topic</h2>

    {{-- SEARCH --}}
    <form method="GET" action="{{ route('topic.index') }}" class="mb-4 flex gap-3">

        <input type="text" name="keyword" placeholder="Tìm tên topic" value="{{ request('keyword') }}"
            class="border px-3 py-2 rounded">

        <button class="bg-green-600 text-white px-4 py-2 rounded">
            Lọc
        </button>

        <a href="{{ route('topic.index') }}" class="bg-gray-400 text-white px-4 py-2 rounded">
            Reset
        </a>
    </form>

    {{-- BUTTON --}}
    <div class="mb-4 flex gap-3">

        <a href="{{ route('topic.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
            ➕ Thêm mới
        </a>

        <a href="{{ route('admin.topic.trash') }}" class="bg-red-500 text-white px-4 py-2 rounded">
            🗑 Thùng rác
        </a>
    </div>

    {{-- TABLE --}}
    <table class="w-full border">
        <thead class="bg-gray-100">
            <tr>
                <th class="border p-2">ID</th>
                <th class="border p-2">Tên</th>
                <th class="border p-2">Slug</th>
                <th class="border p-2">Sắp xếp</th>
                <th class="border p-2">Trạng thái</th>
                <th class="border p-2">Action</th>
            </tr>
        </thead>

        <tbody>
            @forelse($topics as $item)
                <tr>
                    <td class="border p-2">{{ $item->id }}</td>
                    <td class="border p-2">{{ $item->name }}</td>
                    <td class="border p-2">{{ $item->slug }}</td>
                    <td class="border p-2">{{ $item->sort_order }}</td>

                    <td class="border p-2">
                        <span
                            class="px-2 py-1 rounded text-white
                            {{ $item->status == 1 ? 'bg-green-500' : 'bg-gray-400' }}">
                            {{ $item->status == 1 ? 'Hiển thị' : 'Ẩn' }}
                        </span>
                    </td>

                    <td class="border p-2">
                        <div class="flex gap-2">

                            <a href="{{ route('topic.show', $item->id) }}">👁</a>

                            <a href="{{ route('topic.edit', $item->id) }}">✏</a>

                            <a href="{{ route('admin.topic.status', $item->id) }}">🔄</a>

                            <form action="{{ route('topic.destroy', $item->id) }}" method="POST"
                                onsubmit="return confirm('Xóa topic này?')">
                                @csrf
                                @method('DELETE')
                                <button>🗑</button>
                            </form>

                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center p-4">
                        Không có topic
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $topics->withQueryString()->links() }}
    </div>

</x-layout-admin>
