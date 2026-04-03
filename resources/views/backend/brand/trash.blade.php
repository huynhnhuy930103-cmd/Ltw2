<x-layout-admin>

    <h2 class="text-2xl font-bold mb-4">Thùng rác thương hiệu</h2>

    <div class="mb-4">
        <a href="{{ route('brand.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">
            ← Quay lại
        </a>
    </div>

    <table class="w-full border border-gray-300">

        <thead class="bg-gray-100">
            <tr>
                <th class="border p-2">ID</th>
                <th class="border p-2">Tên</th>
                <th class="border p-2">Slug</th>
                <th class="border p-2">Hành động</th>
            </tr>
        </thead>

        <tbody>
            @forelse($brands as $item)
                <tr>

                    <td class="border p-2 text-center">
                        {{ $item->id }}
                    </td>

                    <td class="border p-2">
                        {{ $item->name }}
                    </td>

                    <td class="border p-2">
                        {{ $item->slug }}
                    </td>

                    <td class="border p-2">
                        <div class="flex gap-3 justify-center">

                            {{-- RESTORE --}}
                            <a href="{{ route('brand.restore', $item->id) }}" class="text-green-600">
                                ♻ Khôi phục
                            </a>

                            {{-- DELETE --}}
                            <form action="{{ route('brand.delete', $item->id) }}" method="POST"
                                onsubmit="return confirm('Xóa vĩnh viễn?')">

                                @csrf
                                @method('DELETE')

                                <button class="text-red-600">
                                    🗑 Xóa
                                </button>

                            </form>

                        </div>
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

    <div class="mt-4">
        {{ $brands->links() }}
    </div>

</x-layout-admin>
