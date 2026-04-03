<x-layout-admin>

    <h2 class="text-2xl font-bold mb-4">Quản lý thương hiệu</h2>

    {{-- 🔍 FILTER --}}
    <form method="GET" action="{{ route('brand.index') }}" class="mb-4 flex gap-3">

        <input type="text" name="keyword" placeholder="Tìm thương hiệu" value="{{ request('keyword') }}"
            class="border px-3 py-2 rounded">

        <button class="bg-green-600 text-white px-4 py-2 rounded">
            Lọc
        </button>

        <a href="{{ route('brand.index') }}" class="bg-gray-400 text-white px-4 py-2 rounded">
            Reset
        </a>

    </form>

    {{-- 🔗 BUTTON --}}
    <div class="mb-4 flex gap-3">

        <a href="{{ route('brand.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
            ➕ Thêm mới
        </a>

        <a href="{{ route('admin.brand.trash') ?? route('admin.brand.trash') }}"
            class="bg-red-500 text-white px-4 py-2 rounded">
            🗑 Thùng rác
        </a>

    </div>

    {{-- 📋 TABLE --}}
    <table class="w-full border border-gray-300">

        <thead class="bg-gray-100">
            <tr>
                <th class="border p-2">ID</th>
                <th class="border p-2">Hình</th>
                <th class="border p-2">Tên</th>
                <th class="border p-2">Slug</th>
                <th class="border p-2">Thứ tự</th>
                <th class="border p-2">Trạng thái</th>
                <th class="border p-2">Chức năng</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($brands as $item)
                <tr>

                    <td class="border p-2 text-center">
                        {{ $item->id }}
                    </td>

                    {{-- IMAGE --}}
                    <td class="border p-2 text-center">
                        @if ($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}"
                                class="w-12 h-12 object-cover mx-auto rounded">
                        @endif
                    </td>

                    <td class="border p-2">
                        {{ $item->name }}
                    </td>

                    <td class="border p-2">
                        {{ $item->slug }}
                    </td>

                    <td class="border p-2 text-center">
                        {{ $item->sort_order }}
                    </td>

                    {{-- STATUS --}}
                    <td class="border p-2 text-center">
                        <a href="{{ route('admin.brand.status', $item->id) }}"
                            class="px-3 py-1 rounded text-white
                           {{ $item->status == 1 ? 'bg-green-500' : 'bg-gray-400' }}">
                            {{ $item->status == 1 ? 'Hiển thị' : 'Ẩn' }}
                        </a>
                    </td>

                    {{-- ACTION --}}
                    <td class="border p-2">
                        <div class="flex gap-2 justify-center">

                            <a href="{{ route('brand.show', $item->id) }}" class="text-blue-600">
                                👁
                            </a>

                            <a href="{{ route('brand.edit', $item->id) }}" class="text-yellow-500">
                                ✏
                            </a>

                            <form action="{{ route('brand.destroy', $item->id) }}" method="POST"
                                onsubmit="return confirm('Xóa thương hiệu này?')">

                                @csrf
                                @method('DELETE')

                                <button class="text-red-600">
                                    🗑
                                </button>
                            </form>

                        </div>
                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center p-4">
                        Không có thương hiệu
                    </td>
                </tr>
            @endforelse
        </tbody>

    </table>

    {{-- 📄 PAGINATION --}}
    <div class="mt-4">
        {{ $brands->withQueryString()->links() }}
    </div>

</x-layout-admin>
