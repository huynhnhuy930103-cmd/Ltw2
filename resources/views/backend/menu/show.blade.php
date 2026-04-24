<x-layout-admin>

<div class="min-h-screen bg-gradient-to-br from-emerald-100 via-blue-50 to-indigo-100 p-6">

    <div class="max-w-4xl mx-auto bg-white/80 backdrop-blur-md p-8 rounded-2xl shadow-xl border border-gray-200">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-gray-800">
                📄 Chi tiết Menu
            </h2>

            <a href="{{ route('menu.index') }}"
               class="px-5 py-2 rounded-lg bg-gray-400 text-white hover:bg-gray-500">
                ← Quay lại
            </a>
        </div>

        <!-- CONTENT -->
        <div class="grid grid-cols-2 gap-6 text-sm">

            <div>
                <p class="text-gray-500">ID</p>
                <p class="font-semibold text-gray-800">{{ $menu->id }}</p>
            </div>

            <div>
                <p class="text-gray-500">Tên menu</p>
                <p class="font-semibold text-gray-800">{{ $menu->name }}</p>
            </div>

            <div>
                <p class="text-gray-500">Link</p>
                <p class="text-blue-600 font-medium">{{ $menu->link }}</p>
            </div>

            <div>
                <p class="text-gray-500">Vị trí</p>
                <span class="px-3 py-1 rounded-full text-xs font-semibold
                    {{ $menu->position == 'mainmenu' ? 'bg-indigo-100 text-indigo-600' : 'bg-gray-200 text-gray-600' }}">
                    {{ $menu->position }}
                </span>
            </div>

            <div>
                <p class="text-gray-500">Type</p>
                <span class="px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-600">
                    {{ $menu->type }}
                </span>
            </div>

            <div>
                <p class="text-gray-500">Thứ tự</p>
                <p class="font-semibold text-gray-800">{{ $menu->sort_order }}</p>
            </div>

            <div>
                <p class="text-gray-500">Trạng thái</p>
                @if($menu->status)
                    <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-xs font-semibold">
                        ● Hiển thị
                    </span>
                @else
                    <span class="bg-gray-200 text-gray-600 px-3 py-1 rounded-full text-xs font-semibold">
                        ● Ẩn
                    </span>
                @endif
            </div>

        </div>

        <!-- ACTION -->
        <div class="mt-6 flex justify-end gap-3">

            <a href="{{ route('menu.edit', $menu->id) }}"
               class="px-5 py-2 rounded-lg bg-yellow-400 hover:bg-yellow-500 text-white shadow">
                ✏ Sửa
            </a>

            <form action="{{ route('menu.destroy', $menu->id) }}"
                  method="POST"
                  onsubmit="return confirm('Xóa menu này?')">

                @csrf
                @method('DELETE')

                <button class="px-5 py-2 rounded-lg bg-red-500 hover:bg-red-600 text-white shadow">
                    🗑 Xóa
                </button>

            </form>

        </div>

    </div>

</div>

</x-layout-admin>
