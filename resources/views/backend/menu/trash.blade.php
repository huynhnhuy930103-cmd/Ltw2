<x-layout-admin>

<div class="min-h-screen bg-gradient-to-br from-red-100 via-pink-50 to-indigo-100 p-6">

    <div class="max-w-5xl mx-auto bg-white/80 backdrop-blur-md rounded-2xl shadow-xl border border-gray-200 overflow-hidden">

        <!-- HEADER -->
        <div class="flex justify-between items-center p-6 border-b">
            <h2 class="text-3xl font-bold text-gray-800">
                🗑 Thùng rác Menu
            </h2>

            <a href="{{ route('menu.index') }}"
               class="px-5 py-2 rounded-lg bg-gray-400 text-white hover:bg-gray-500">
                ← Quay lại
            </a>
        </div>

        <!-- TABLE -->
        <table class="w-full text-sm">

            <thead class="bg-gradient-to-r from-red-500 to-pink-500 text-white text-xs uppercase">
                <tr>
                    <th class="p-4 text-left">ID</th>
                    <th class="p-4 text-left">Tên menu</th>
                    <th class="p-4 text-center">Hành động</th>
                </tr>
            </thead>

            <tbody class="divide-y">

                @forelse ($menus as $item)
                <tr class="hover:bg-pink-50 transition">

                    <td class="p-4 font-semibold text-gray-600">
                        {{ $item->id }}
                    </td>

                    <td class="p-4 font-semibold text-gray-800">
                        {{ $item->name }}
                    </td>

                    <td class="p-4">
                        <div class="flex justify-center gap-3">

                            <!-- RESTORE -->
                            <a href="{{ route('admin.menu.restore', $item->id) }}"
                               class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded-lg shadow">
                                ♻ Khôi phục
                            </a>

                            <!-- DELETE -->
                            <form action="{{ route('admin.menu.delete', $item->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Xóa vĩnh viễn menu này?')">

                                @csrf
                                @method('DELETE')

                                <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg shadow">
                                    ❌ Xóa vĩnh viễn
                                </button>

                            </form>

                        </div>
                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center p-6 text-gray-400">
                        😢 Thùng rác trống
                    </td>
                </tr>
                @endforelse

            </tbody>

        </table>

    </div>

</div>

</x-layout-admin>
