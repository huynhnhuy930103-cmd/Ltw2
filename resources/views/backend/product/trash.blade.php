<x-layout-admin>

    <h2 class="text-2xl font-bold mb-4">Thùng rác sản phẩm</h2>

    <div class="mb-4">
        <a href="{{ route('product.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
            ← Quay lại
        </a>
    </div>

    <table class="w-full border border-gray-300">
        <thead class="bg-gray-100">
            <tr>
                <th class="border p-2">ID</th>
                <th class="border p-2">Tên</th>
                <th class="border p-2">Chức năng</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $item)
                <tr>
                    <td class="border p-2">{{ $item->id }}</td>
                    <td class="border p-2">{{ $item->name }}</td>
                    <td class="border p-2">
                        <div class="flex gap-2">

                            {{-- khôi phục --}}
                            <a href="{{ route('admin.product.restore', $item->id) }}"
                                class="bg-green-500 text-white px-2 py-1 rounded">
                                ♻
                            </a>
                            {{-- xóa vĩnh viễn --}}
                            <form action="{{ route('admin.product.delete', $item->id) }}" method="POST"
                                onsubmit="return confirm('Xóa vĩnh viễn?')">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-500 text-white px-2 py-1 rounded">
                                    ❌
                                </button>
                            </form>

                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $products->links() }}
    </div>

</x-layout-admin>
