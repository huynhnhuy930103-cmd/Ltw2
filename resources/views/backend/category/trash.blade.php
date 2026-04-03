<x-layout-admin>

    <h2 class="text-2xl font-bold mb-4">Thùng rác danh mục</h2>

    <a href="{{ route('category.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
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
            @forelse ($categories as $item)
                <tr>

                    <td class="border p-2">{{ $item->id }}</td>
                    <td class="border p-2">{{ $item->name }}</td>

                    <td class="border p-2 flex gap-3 items-center">

                        {{-- ♻ RESTORE (GET) --}}
                        <a href="{{ route('category.restore', $item->id) }}" class="text-green-600"
                            onclick="return confirm('Khôi phục danh mục này?')">
                            ♻ Khôi phục
                        </a>

                        {{-- ❌ FORCE DELETE (DELETE) --}}
                        <form action="{{ route('category.delete', $item->id) }}" method="POST"
                            onsubmit="return confirm('Xóa vĩnh viễn?')">

                            @csrf
                            @method('DELETE')

                            <button class="text-red-600">
                                ❌ Xóa
                            </button>

                        </form>

                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center p-4">
                        Không có dữ liệu
                    </td>
                </tr>
            @endforelse
        </tbody>

    </table>

</x-layout-admin>
