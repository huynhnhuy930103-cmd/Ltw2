<x-layout-admin>

<div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-indigo-100 p-6">

    {{-- HEADER --}}
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">
            🏷 Quản lý thương hiệu
        </h2>

        <div class="space-x-2">

            <a href="{{ route('brand.create') }}"
               class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 shadow-lg">
                ➕ Thêm mới
            </a>

            <a href="{{ route('admin.brand.trash') }}"
               class="bg-gray-700 text-white px-4 py-2 rounded-lg hover:bg-gray-800 shadow-lg">
                🗑 Thùng rác
            </a>

        </div>
    </div>

    {{-- FILTER --}}
    <div class="bg-white/80 backdrop-blur-md p-4 rounded-2xl shadow-lg mb-6 border border-gray-200">

        <form method="GET" action="{{ route('brand.index') }}" class="flex gap-3">

            <input type="text"
                   name="keyword"
                   value="{{ request('keyword') }}"
                   placeholder="🔍 Tìm thương hiệu..."
                   class="border px-4 py-2 rounded-lg w-64 focus:ring-2 focus:ring-blue-400 outline-none">

            <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                Lọc
            </button>

            <a href="{{ route('brand.index') }}"
               class="bg-gray-400 text-white px-4 py-2 rounded-lg hover:bg-gray-500">
                Reset
            </a>

        </form>

    </div>

    {{-- TABLE --}}
    <div class="bg-white/90 backdrop-blur-md rounded-2xl shadow-xl overflow-hidden border border-gray-200">

        <table class="w-full text-center">

            <thead class="bg-gradient-to-r from-blue-500 to-indigo-500 text-white">
                <tr>
                    <th class="p-3">ID</th>
                    <th class="p-3">Hình</th>
                    <th class="p-3">Tên</th>
                    <th class="p-3">Slug</th>
                    <th class="p-3">Thứ tự</th>
                    <th class="p-3">Trạng thái</th>
                    <th class="p-3">Chức năng</th>
                </tr>
            </thead>

            <tbody>

                @forelse ($brands as $item)
                <tr class="border-t hover:bg-blue-50 transition">

                    <td class="p-3 font-semibold text-gray-600">
                        {{ $item->id }}
                    </td>

                    {{-- IMAGE --}}
                    <td class="p-3">
                        @if ($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}"
                                 class="w-12 h-12 object-cover mx-auto rounded-lg shadow">
                        @else
                            <span class="text-gray-400">—</span>
                        @endif
                    </td>

                    <td class="p-3 font-semibold text-gray-800">
                        {{ $item->name }}
                    </td>

                    <td class="p-3 text-gray-500">
                        {{ $item->slug }}
                    </td>

                    <td class="p-3">
                        <span class="bg-gray-100 px-3 py-1 rounded-full text-sm">
                            {{ $item->sort_order }}
                        </span>
                    </td>

                    {{-- STATUS --}}
                    <td class="p-3">
                        <a href="{{ route('admin.brand.status', $item->id) }}"
                           class="px-3 py-1 rounded-full text-white text-sm
                           {{ $item->status == 1 ? 'bg-green-500' : 'bg-gray-400' }}">
                            {{ $item->status == 1 ? 'Hiển thị' : 'Ẩn' }}
                        </a>
                    </td>

                    {{-- ACTION --}}
                    <td class="p-3">
                        <div class="flex justify-center gap-2">

                            <a href="{{ route('brand.show', $item->id) }}"
                               class="bg-blue-500 text-white px-3 py-1 rounded-lg hover:bg-blue-600 shadow">
                                👁
                            </a>

                            <a href="{{ route('brand.edit', $item->id) }}"
                               class="bg-yellow-400 px-3 py-1 rounded-lg hover:bg-yellow-500 shadow">
                                ✏
                            </a>

                            <form action="{{ route('brand.destroy', $item->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Xóa thương hiệu này?')">

                                @csrf
                                @method('DELETE')

                                <button class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600 shadow">
                                    🗑
                                </button>

                            </form>

                        </div>
                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="7" class="p-5 text-gray-400">
                        🚫 Không có thương hiệu
                    </td>
                </tr>
                @endforelse

            </tbody>

        </table>

    </div>

    {{-- PAGINATION --}}
    <div class="mt-4">
        {{ $brands->withQueryString()->links() }}
    </div>

</div>

</x-layout-admin>
