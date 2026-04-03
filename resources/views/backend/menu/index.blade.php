<x-layout-admin>

    <h2 class="text-2xl font-bold mb-4">Quản lý Menu</h2>

    {{-- BUTTON --}}
    <div class="mb-4 flex gap-3">
        <a href="{{ route('menu.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
            ➕ Thêm menu
        </a>

        <a href="{{ route('admin.menu.trash') }}" class="bg-red-500 text-white px-4 py-2 rounded">
            🗑 Thùng rác
        </a>
    </div>

    {{-- TABLE --}}
    <table class="w-full border border-gray-300">
        <thead class="bg-gray-100">
            <tr>
                <th class="border p-2">ID</th>
                <th class="border p-2">Tên</th>
                <th class="border p-2">Link</th>
                <th class="border p-2">Vị trí</th>
                <th class="border p-2">Type</th>
                <th class="border p-2">Trạng thái</th>
                <th class="border p-2">Chức năng</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($menus as $item)
                <tr>
                    <td class="border p-2">{{ $item->id }}</td>
                    <td class="border p-2">{{ $item->name }}</td>
                    <td class="border p-2">{{ $item->link }}</td>
                    <td class="border p-2">{{ $item->position }}</td>
                    <td class="border p-2">{{ $item->type }}</td>

                    <td class="border p-2">
                        <span
                            class="px-2 py-1 rounded text-white
                            {{ $item->status ? 'bg-green-500' : 'bg-gray-400' }}">
                            {{ $item->status ? 'Hiển thị' : 'Ẩn' }}
                        </span>
                    </td>

                    <td class="border p-2 flex gap-2">

                        <a href="{{ route('menu.show', $item->id) }}">👁</a>

                        <a href="{{ route('menu.edit', $item->id) }}">✏</a>

                        <form action="{{ route('menu.destroy', $item->id) }}" method="POST"
                            onsubmit="return confirm('Xóa menu này?')">
                            @csrf
                            @method('DELETE')
                            <button>🗑</button>
                        </form>

                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center p-4">Không có menu</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</x-layout-admin>
