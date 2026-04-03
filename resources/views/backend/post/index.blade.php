<x-layout-admin>

    <h2 class="text-2xl font-bold mb-4">Quản lý bài viết</h2>

    {{-- BUTTON --}}
    <div class="mb-4 flex gap-3">
        <a href="{{ route('post.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
            ➕ Thêm mới
        </a>

        <a href="{{ route('admin.post.trash') }}" class="bg-red-500 text-white px-4 py-2 rounded">
            🗑 Thùng rác
        </a>
    </div>

    {{-- TABLE --}}
    <table class="w-full border">
        <thead class="bg-gray-100">
            <tr>
                <th class="border p-2">ID</th>
                <th class="border p-2">Tiêu đề</th>
                <th class="border p-2">Slug</th>
                <th class="border p-2">Loại</th>
                <th class="border p-2">Trạng thái</th>
                <th class="border p-2">Chức năng</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($posts as $item)
                <tr>
                    <td class="border p-2">{{ $item->id }}</td>
                    <td class="border p-2">{{ $item->title }}</td>
                    <td class="border p-2">{{ $item->slug }}</td>
                    <td class="border p-2">{{ $item->post_type }}</td>

                    <td class="border p-2">
                        <span class="px-2 py-1 rounded text-white {{ $item->status ? 'bg-green-500' : 'bg-gray-400' }}">
                            {{ $item->status ? 'Hiển thị' : 'Ẩn' }}
                        </span>
                    </td>

                    <td class="border p-2 flex gap-2">
                        <a href="{{ route('post.show', $item->id) }}">👁</a>
                        <a href="{{ route('post.edit', $item->id) }}">✏</a>

                        <form action="{{ route('post.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Xóa?')">🗑</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center p-4">Không có dữ liệu</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</x-layout-admin>
