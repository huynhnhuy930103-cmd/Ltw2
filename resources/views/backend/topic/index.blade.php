<x-layout-admin>

<div class="min-h-screen bg-gradient-to-br from-slate-100 via-blue-50 to-indigo-100 p-6">

    <div class="max-w-6xl mx-auto">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-gray-800">
                🧩 Quản lý Topic
            </h2>

            <div class="flex gap-3">
                <a href="{{ route('topic.create') }}"
                   class="bg-gradient-to-r from-blue-500 to-indigo-500 text-white px-5 py-2 rounded-lg shadow-lg hover:scale-105 transition">
                    ➕ Thêm mới
                </a>

                <a href="{{ route('admin.topic.trash') }}"
                   class="bg-gradient-to-r from-red-500 to-pink-500 text-white px-5 py-2 rounded-lg shadow-lg hover:scale-105 transition">
                    🗑 Thùng rác
                </a>
            </div>
        </div>

        <!-- SEARCH -->
        <form method="GET" action="{{ route('topic.index') }}"
              class="mb-6 flex gap-3">

            <input type="text" name="keyword"
                placeholder="🔍 Tìm tên topic..."
                value="{{ request('keyword') }}"
                class="flex-1 border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400 outline-none">

            <button class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">
                Lọc
            </button>

            <a href="{{ route('topic.index') }}"
               class="bg-gray-400 text-white px-4 py-2 rounded-lg hover:bg-gray-500">
                Reset
            </a>
        </form>

        <!-- TABLE CARD -->
        <div class="bg-white/80 backdrop-blur-md rounded-2xl shadow-xl overflow-hidden border border-gray-200">

            <table class="w-full text-sm">

                <!-- HEAD -->
                <thead class="bg-gradient-to-r from-indigo-500 to-blue-500 text-white text-xs uppercase">
                    <tr>
                        <th class="p-4 text-left">ID</th>
                        <th class="p-4 text-left">Tên</th>
                        <th class="p-4 text-left">Slug</th>
                        <th class="p-4 text-center">Sắp xếp</th>
                        <th class="p-4 text-center">Trạng thái</th>
                        <th class="p-4 text-center">Chức năng</th>
                    </tr>
                </thead>

                <!-- BODY -->
                <tbody class="divide-y">

                    @forelse($topic as $item)
                    <tr class="hover:bg-indigo-50 transition">

                        <td class="p-4 font-semibold text-gray-600">
                            {{ $item->id }}
                        </td>

                        <td class="p-4 font-semibold text-gray-800">
                            {{ $item->name }}
                        </td>

                        <td class="p-4 text-gray-600">
                            {{ $item->slug }}
                        </td>

                        <td class="p-4 text-center text-gray-600">
                            {{ $item->sort_order }}
                        </td>

                        <!-- STATUS -->
                        <td class="p-4 text-center">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold
                                {{ $item->status == 1 ? 'bg-green-100 text-green-600' : 'bg-gray-200 text-gray-600' }}">
                                {{ $item->status == 1 ? '● Hiển thị' : '● Ẩn' }}
                            </span>
                        </td>

                        <!-- ACTION -->
                        <td class="p-4">
                            <div class="flex justify-center gap-2">

                                <a href="{{ route('topic.show', $item->id) }}"
                                   class="bg-blue-500 text-white px-3 py-1 rounded-lg hover:bg-blue-600 shadow">
                                    👁
                                </a>

                                <a href="{{ route('topic.edit', $item->id) }}"
                                   class="bg-yellow-400 px-3 py-1 rounded-lg hover:bg-yellow-500 shadow">
                                    ✏
                                </a>

                                <a href="{{ route('admin.topic.status', $item->id) }}"
                                   class="bg-indigo-500 text-white px-3 py-1 rounded-lg hover:bg-indigo-600 shadow">
                                    🔄
                                </a>

                                <form action="{{ route('topic.destroy', $item->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Xóa topic này?')">
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
                        <td colspan="6" class="text-center p-6 text-gray-400">
                            😢 Không có topic
                        </td>
                    </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

        <!-- PAGINATION -->
        <div class="mt-6">
            {{ $topic->withQueryString()->links() }}
        </div>

    </div>

</div>

</x-layout-admin>
