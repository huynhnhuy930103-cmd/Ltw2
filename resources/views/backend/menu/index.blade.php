<x-layout-admin>

<div class="min-h-screen bg-gradient-to-br from-emerald-100 via-blue-50 to-indigo-100 p-6">

    <!-- HEADER -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold text-gray-800">
            📋 Quản lý Menu
        </h2>

        <div class="flex gap-3">
            <a href="{{ route('menu.create') }}"
               class="bg-gradient-to-r from-blue-500 to-indigo-500 text-white px-5 py-2 rounded-lg shadow-lg hover:scale-105 transition">
                ➕ Thêm menu
            </a>

            <a href="{{ route('admin.menu.trash') }}"
               class="bg-gradient-to-r from-red-500 to-pink-500 text-white px-5 py-2 rounded-lg shadow-lg hover:scale-105 transition">
                🗑 Thùng rác
            </a>
        </div>
    </div>

    <!-- TABLE CARD -->
    <div class="bg-white/80 backdrop-blur-md rounded-2xl shadow-xl overflow-hidden border border-gray-200">

        <table class="w-full text-sm">

            <thead class="bg-gradient-to-r from-indigo-500 to-blue-500 text-white text-xs uppercase">
                <tr>
                    <th class="p-4 text-left">ID</th>
                    <th class="p-4 text-left">Tên</th>
                    <th class="p-4 text-left">Link</th>
                    <th class="p-4 text-center">Vị trí</th>
                    <th class="p-4 text-center">Type</th>
                    <th class="p-4 text-center">Trạng thái</th>
                    <th class="p-4 text-center">Chức năng</th>
                </tr>
            </thead>

            <tbody class="divide-y">

                @forelse ($menus as $item)
                <tr class="hover:bg-indigo-50 transition">

                    <td class="p-4 font-semibold text-gray-600">
                        {{ $item->id }}
                    </td>

                    <td class="p-4 font-semibold text-gray-800">
                        {{ $item->name }}
                    </td>

                    <td class="p-4 text-gray-600">
                        {{ $item->link }}
                    </td>

                    <td class="p-4 text-center">
                        <span class="bg-purple-100 text-purple-600 px-3 py-1 rounded-full text-xs">
                            {{ $item->position }}
                        </span>
                    </td>

                    <td class="p-4 text-center">
                        <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-xs">
                            {{ $item->type }}
                        </span>
                    </td>

                    <!-- STATUS -->
                    <td class="p-4 text-center">
                        @if($item->status)
                            <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-xs">
                                ● Hiển thị
                            </span>
                        @else
                            <span class="bg-gray-200 text-gray-600 px-3 py-1 rounded-full text-xs">
                                ● Ẩn
                            </span>
                        @endif
                    </td>

                    <!-- ACTION -->
                    <td class="p-4">
                        <div class="flex justify-center gap-2">

                            <a href="{{ route('menu.show', $item->id) }}"
                               class="bg-blue-500 text-white px-3 py-1 rounded-lg hover:bg-blue-600 shadow">
                                👁
                            </a>

                            <a href="{{ route('menu.edit', $item->id) }}"
                               class="bg-yellow-400 px-3 py-1 rounded-lg hover:bg-yellow-500 shadow">
                                ✏
                            </a>

                            <form action="{{ route('menu.destroy', $item->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Xóa menu này?')">

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
                    <td colspan="7" class="text-center p-6 text-gray-400">
                        😢 Không có menu
                    </td>
                </tr>
                @endforelse

            </tbody>

        </table>

    </div>

</div>

</x-layout-admin>
