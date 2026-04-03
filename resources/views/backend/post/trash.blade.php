<x-layout-admin>

    <h2 class="text-2xl font-bold mb-4">Thùng rác bài viết</h2>

    <a href="{{ route('post.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">
        ⬅ Quay lại
    </a>

    <table class="w-full border mt-4">
        <thead>
            <tr>
                <th class="border p-2">ID</th>
                <th class="border p-2">Tiêu đề</th>
                <th class="border p-2">Chức năng</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($posts as $item)
                <tr>
                    <td class="border p-2">{{ $item->id }}</td>
                    <td class="border p-2">{{ $item->title }}</td>

                    <td class="border p-2 flex gap-2">
                        <a href="{{ route('admin.post.restore', $item->id) }}">♻ Restore</a>

                        <form action="{{ route('admin.post.delete', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Xóa vĩnh viễn?')">❌</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</x-layout-admin>
