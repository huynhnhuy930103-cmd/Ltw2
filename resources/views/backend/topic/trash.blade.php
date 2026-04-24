<x-layout-admin>

<div class="min-h-screen bg-gradient-to-br from-slate-100 via-blue-50 to-indigo-100 p-6">

    <div class="max-w-6xl mx-auto">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-gray-800">
                🗑 Thùng rác Topic
            </h2>

            <a href="{{ route('topic.index') }}"
               class="px-5 py-2 rounded-lg bg-gray-400 text-white hover:bg-gray-500">
                ← Quay lại
            </a>
        </div>

        <!-- TABLE CARD -->
        <div class="bg-white/80 backdrop-blur-md rounded-2xl shadow-xl overflow-hidden border border-gray-200">

            <table class="w-full text-sm">

                <!-- HEAD -->
                <thead class="bg-gradient-to-r from-red-500 to-pink-500 text-white text-xs uppercase">
                    <tr>
                        <th class="p-4 text-left">ID</th>
                        <th class="p-4 text-left">Tên</th>
                        <th class="p-4 text-left">Slug</th>
                        <th class="p-4 text-center">Chức năng</th>
                    </tr>
                </thead>

                <!-- BODY -->
                <tbody class="divide-y">

                    @forelse($topics as $item)
                    <tr class="hover:bg-red-50 transition">

                        <td class="p-4 font-semibold text-gray-600">
                            {{ $item->id }}
                        </td>

                        <td class="p-4 font-semibold text-gray-800">
                            {{ $item->name }}
                        </td>

                        <td class="p-4 text-gray-600">
                            {{ $item->slug }}
                        </td>

                        <!-- ACTION -->
                        <td class="p-4">
                            <div class="flex justify-center gap-2">

                                <!-- RESTORE -->
                                <a href="{{ route('admin.topic.restore', $item->id) }}"
                                   class="bg-green-500 text-white px-3 py-1 rounded-lg hover:bg-green-600 shadow">
                                    ♻ Khôi phục
                                </a>

                                <!-- DELETE FOREVER -->
                                <form action="{{ route('admin.topic.delete', $item->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Xóa vĩnh viễn topic này?')">
                                    @csrf
                                    @method('DELETE')

                                    <button class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600 shadow">
                                        ❌ Xóa
                                    </button>
                                </form>

                            </div>
                        </td>

                    </tr>

                    @empty
                    <tr>
                        <td colspan="4" class="text-center p-6 text-gray-400">
                            😢 Thùng rác trống
                        </td>
                    </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

</x-layout-admin>
