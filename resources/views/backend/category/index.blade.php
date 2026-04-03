<x-layout-admin>

    <h2 class="text-2xl font-bold mb-4">Quản lý danh mục</h2>

    {{-- 🔗 BUTTON --}}
    <div class="mb-4 flex gap-3">

        <a href="{{ route('category.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
            ➕ Thêm mới
        </a>

        <a href="{{ route('admin.category.trash') }}" class="bg-red-500 text-white px-4 py-2 rounded">
            🗑 Thùng rác
        </a>

    </div>

    {{-- 📋 TABLE --}}
    <div class="overflow-x-auto">

        <table class="w-full border border-gray-300">

            <thead class="bg-gray-100">
                <tr>
                    <th class="border p-2">ID</th>
                    <th class="border p-2">Tên</th>
                    <th class="border p-2">Slug</th>
                    <th class="border p-2">Danh mục cha</th>
                    <th class="border p-2">Thứ tự</th>
                    <th class="border p-2">Trạng thái</th>
                    <th class="border p-2">Chức năng</th>
                </tr>
            </thead>

            <tbody>

                @forelse ($categories as $item)
                    <tr class="hover:bg-gray-50">

                        {{-- ID --}}
                        <td class="border p-2 text-center">
                            {{ $item->id }}
                        </td>

                        {{-- NAME --}}
                        <td class="border p-2 font-semibold">
                            {{ $item->name }}
                        </td>

                        {{-- SLUG --}}
                        <td class="border p-2 text-gray-600">
                            {{ $item->slug }}
                        </td>

                        {{-- PARENT --}}
                        <td class="border p-2">
                            {{ $item->parent->name ?? '—' }}
                        </td>

                        {{-- SORT --}}
                        <td class="border p-2 text-center">
                            {{ $item->sort_order }}
                        </td>

                        {{-- STATUS --}}
                        <td class="border p-2 text-center">
                            <span
                                class="px-2 py-1 rounded text-white
                                {{ $item->status == 1 ? 'bg-green-500' : 'bg-gray-400' }}">
                                {{ $item->status == 1 ? 'Hiển thị' : 'Ẩn' }}
                            </span>
                        </td>

                        {{-- ACTION --}}
                        <td class="border p-2">

                            <div class="flex gap-3 justify-center items-center">

                                {{-- VIEW --}}
                                <a href="{{ route('category.show', $item->id) }}" class="text-blue-600">
                                    👁
                                </a>

                                {{-- EDIT --}}
                                <a href="{{ route('category.edit', $item->id) }}" class="text-yellow-500">
                                    ✏
                                </a>

                                {{-- DELETE --}}
                                <form action="{{ route('category.destroy', $item->id) }}" method="POST"
                                    onsubmit="return confirm('Chuyển vào thùng rác?')">

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
                            Không có danh mục
                        </td>
                    </tr>
                @endforelse

            </tbody>

        </table>

    </div>

</x-layout-admin>
