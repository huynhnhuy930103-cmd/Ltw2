<x-layout-admin>

    <div class="max-w-6xl mx-auto p-6">

        {{-- HEADER --}}
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-gray-800">
                🗑 Thùng rác thương hiệu
            </h2>

            <a href="{{ route('brand.index') }}"
               class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg shadow transition">
                ← Quay lại
            </a>
        </div>

        {{-- TABLE CARD --}}
        <div class="bg-white shadow-lg rounded-xl overflow-hidden border">

            <table class="w-full text-sm">

                <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                    <tr>
                        <th class="p-3 text-center">ID</th>
                        <th class="p-3 text-left">Tên</th>
                        <th class="p-3 text-left">Slug</th>
                        <th class="p-3 text-center">Hành động</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">

                    @forelse($brands as $item)
                        <tr class="hover:bg-gray-50 transition">

                            <td class="p-3 text-center font-medium text-gray-600">
                                {{ $item->id }}
                            </td>

                            <td class="p-3 font-semibold text-gray-800">
                                {{ $item->name }}
                            </td>

                            <td class="p-3 text-gray-500">
                                {{ $item->slug }}
                            </td>

                            <td class="p-3">
                                <div class="flex justify-center gap-3">

                                    {{-- RESTORE --}}
                                    <a href="{{ route('admin.brand.restore', $item->id) }}"
                                       class="px-3 py-1 rounded-md bg-green-100 text-green-700 hover:bg-green-200 transition text-sm">
                                        ♻ Khôi phục
                                    </a>

                                    {{-- DELETE --}}
                                    <form action="{{ route('admin.brand.delete', $item->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Xóa vĩnh viễn?')">

                                        @csrf
                                        @method('DELETE')

                                        <button class="px-3 py-1 rounded-md bg-red-100 text-red-700 hover:bg-red-200 transition text-sm">
                                            🗑 Xóa
                                        </button>

                                    </form>

                                </div>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center p-8 text-gray-500">
                                <div class="flex flex-col items-center gap-2">
                                    <span class="text-3xl">🗂</span>
                                    <p>Thùng rác trống</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

        {{-- PAGINATION --}}
        <div class="mt-6">
            <div class="bg-white p-3 rounded-lg shadow flex justify-center">
                {{ $brands->links() }}
            </div>
        </div>

    </div>

</x-layout-admin>
