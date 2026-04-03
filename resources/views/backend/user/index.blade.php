<x-layout-admin>

    <h2 class="text-2xl font-bold mb-4">Quản lý người dùng</h2>

    {{-- 🔗 BUTTON --}}
    <div class="mb-4 flex gap-3">

        <a href="{{ route('user.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
            ➕ Thêm user
        </a>

        <a href="{{ route('admin.user.trash') }}" class="bg-red-500 text-white px-4 py-2 rounded">
            🗑 Thùng rác
        </a>

    </div>

    {{-- 📋 TABLE --}}
    <table class="w-full border border-gray-300">

        <thead class="bg-gray-100">
            <tr>
                <th class="border p-2">ID</th>
                <th class="border p-2">Tên</th>
                <th class="border p-2">Email</th>
                <th class="border p-2">SĐT</th>
                <th class="border p-2">Role</th>
                <th class="border p-2">Trạng thái</th>
                <th class="border p-2">Chức năng</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($users as $item)
                <tr>

                    <td class="border p-2">{{ $item->id }}</td>
                    <td class="border p-2">{{ $item->name }}</td>
                    <td class="border p-2">{{ $item->email }}</td>
                    <td class="border p-2">{{ $item->phone }}</td>

                    <td class="border p-2">
                        <span
                            class="px-2 py-1 rounded text-white
                            {{ $item->roles == 'admin' ? 'bg-red-500' : 'bg-blue-500' }}">
                            {{ $item->roles }}
                        </span>
                    </td>

                    <td class="border p-2">
                        <span
                            class="px-2 py-1 rounded text-white
                            {{ $item->status == 1 ? 'bg-green-500' : 'bg-gray-400' }}">
                            {{ $item->status == 1 ? 'Active' : 'Hidden' }}
                        </span>
                    </td>

                    <td class="border p-2">
                        <div class="flex gap-2">

                            <a href="{{ route('user.show', $item->id) }}">👁</a>

                            <a href="{{ route('user.edit', $item->id) }}">✏</a>

                            <form action="{{ route('user.destroy', $item->id) }}" method="POST"
                                onsubmit="return confirm('Xóa user này?')">
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
                        Không có user
                    </td>
                </tr>
            @endforelse
        </tbody>

    </table>

</x-layout-admin>
