<x-layout-admin>

    <h2 class="text-2xl font-bold mb-4">Quản lý Contact</h2>

    {{-- SEARCH --}}
    <form method="GET" action="{{ route('contact.index') }}" class="mb-4 flex gap-3">

        <input type="text" name="keyword" placeholder="Tìm tên / email / phone" value="{{ request('keyword') }}"
            class="border px-3 py-2 rounded">

        <button class="bg-green-600 text-white px-4 py-2 rounded">
            Lọc
        </button>

        <a href="{{ route('contact.index') }}" class="bg-gray-400 text-white px-4 py-2 rounded">
            Reset
        </a>
    </form>

    {{-- BUTTON --}}
    <div class="mb-4 flex gap-3">

        <a href="{{ route('contact.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
            ➕ Thêm mới
        </a>

        <a href="{{ route('admin.contact.trash') }}" class="bg-red-500 text-white px-4 py-2 rounded">
            🗑 Thùng rác
        </a>
    </div>

    {{-- TABLE --}}
    <table class="w-full border">
        <thead class="bg-gray-100">
            <tr>
                <th class="border p-2">ID</th>
                <th class="border p-2">Tên</th>
                <th class="border p-2">Email</th>
                <th class="border p-2">Phone</th>
                <th class="border p-2">Tiêu đề</th>
                <th class="border p-2">Trạng thái</th>
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
                    <td class="border p-2">{{ $item->title }}</td>

                    <td class="border p-2">
                        <span
                            class="px-2 py-1 rounded text-white
                        {{ $item->status == 1 ? 'bg-green-500' : 'bg-gray-400' }}">
                            {{ $item->status == 1 ? 'Đã xử lý' : 'Chờ xử lý' }}
                        </span>
                    </td>

                    <td class="border p-2">
                        <div class="flex gap-2">

                            <a href="{{ route('contact.show', $item->id) }}">👁</a>

                            <a href="{{ route('contact.edit', $item->id) }}">✏</a>

                            <form action="{{ route('contact.destroy', $item->id) }}" method="POST"
                                onsubmit="return confirm('Xóa contact này?')">
                                @csrf
                                @method('DELETE')
                                <button>🗑</button>
                            </form>

                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center p-4">
                        Không có contact
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $contacts->withQueryString()->links() }}
    </div>

</x-layout-admin>
