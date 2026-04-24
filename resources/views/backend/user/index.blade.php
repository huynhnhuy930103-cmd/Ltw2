<x-layout-admin>

<div class="min-h-screen bg-gradient-to-br from-slate-100 via-blue-50 to-indigo-100 p-6">

    {{-- HEADER --}}
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold text-gray-800">
            👤 Quản lý người dùng
        </h2>

        <div class="flex gap-3">

            <a href="{{ route('user.create') }}"
               class="bg-gradient-to-r from-blue-500 to-indigo-500 text-white px-5 py-2 rounded-lg shadow-lg hover:scale-105 transition">
                ➕ Thêm user
            </a>

            <a href="{{ route('admin.user.trash') }}"
               class="bg-gradient-to-r from-red-500 to-pink-500 text-white px-5 py-2 rounded-lg shadow-lg hover:scale-105 transition">
                🗑 Thùng rác
            </a>

        </div>
    </div>

    {{-- TABLE CARD --}}
    <div class="bg-white/80 backdrop-blur-md rounded-2xl shadow-xl overflow-hidden border border-gray-200">

        <table class="w-full text-sm">

            <thead class="bg-gradient-to-r from-indigo-500 to-blue-500 text-white text-xs uppercase">
                <tr>
                    <th class="p-4 text-left">ID</th>
                    <th class="p-4 text-left">Tên</th>
                    <th class="p-4 text-left">Email</th>
                    <th class="p-4 text-left">SĐT</th>
                    <th class="p-4 text-center">Role</th>
                    <th class="p-4 text-center">Trạng thái</th>
                    <th class="p-4 text-center">Chức năng</th>
                </tr>
            </thead>

            <tbody class="divide-y">

                @forelse ($users as $item)
                <tr class="hover:bg-indigo-50 transition">

                    <td class="p-4 font-semibold text-gray-600">
                        {{ $item->id }}
                    </td>

                    <td class="p-4 font-semibold text-gray-800">
                        {{ $item->name }}
                    </td>

                    <td class="p-4 text-gray-600">
                        {{ $item->email }}
                    </td>

                    <td class="p-4 text-gray-600">
                        {{ $item->phone }}
                    </td>

                    {{-- ROLE --}}
                    <td class="p-4 text-center">
                        <span class="px-3 py-1 rounded-full text-xs font-semibold
                            {{ $item->roles == 'admin' ? 'bg-red-100 text-red-600' : 'bg-blue-100 text-blue-600' }}">
                            {{ $item->roles }}
                        </span>
                    </td>

                    {{-- STATUS --}}
                    <td class="p-4 text-center">
                        @if($item->status == 1)
                            <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-xs">
                                ● Active
                            </span>
                        @else
                            <span class="bg-gray-200 text-gray-600 px-3 py-1 rounded-full text-xs">
                                ● Hidden
                            </span>
                        @endif
                    </td>

                    {{-- ACTION --}}
                    <td class="p-4">
                        <div class="flex justify-center gap-2">

                            <a href="{{ route('user.show', $item->id) }}"
                               class="bg-blue-500 text-white px-3 py-1 rounded-lg hover:bg-blue-600 shadow">
                                👁
                            </a>

                            <a href="{{ route('user.edit', $item->id) }}"
                               class="bg-yellow-400 px-3 py-1 rounded-lg hover:bg-yellow-500 shadow">
                                ✏
                            </a>

                            <form action="{{ route('user.destroy', $item->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Xóa user này?')">

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
                        😢 Không có user
                    </td>
                </tr>
                @endforelse

            </tbody>

        </table>
        

    </div>

</div>

</x-layout-admin>
