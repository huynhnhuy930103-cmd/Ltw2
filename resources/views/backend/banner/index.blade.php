<x-layout-admin>

<div class="min-h-screen bg-gradient-to-br from-slate-100 via-blue-50 to-indigo-100 p-6">

    <!-- HEADER -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold text-gray-800">
            🖼 Quản lý banner
        </h2>

        <div class="flex gap-3">

    <a href="{{ route('banner.create') }}"
       class="bg-gradient-to-r from-blue-500 to-indigo-500 text-white px-5 py-2 rounded-lg shadow-lg hover:scale-105 transition">
        ➕ Thêm mới
    </a>

    <a href="{{ route('admin.banner.trash') }}"
       class="bg-gradient-to-r from-red-500 to-pink-500 text-white px-5 py-2 rounded-lg shadow-lg hover:scale-105 transition">
        🗑 Thùng rác
    </a>

</div>
    </div>

    <!-- TABLE CARD -->
    <div class="bg-white/80 backdrop-blur-md rounded-2xl shadow-xl overflow-hidden border border-gray-200">

        <table class="w-full text-sm">

            <!-- HEADER -->
            <thead class="bg-gradient-to-r from-indigo-500 to-blue-500 text-white text-xs uppercase">
                <tr>
                    <th class="p-4 text-left">ID</th>
                    <th class="p-4 text-left">Hình ảnh</th>
                    <th class="p-4 text-left">Tên</th>
                    <th class="p-4 text-left">Link</th>
                    <th class="p-4 text-left">Vị trí</th>
                    <th class="p-4 text-center">Sắp xếp</th>
                    <th class="p-4 text-center">Trạng thái</th>
                    <th class="p-4 text-center">Chức năng</th>
                </tr>
            </thead>

            <tbody class="divide-y">

                @foreach($banners as $item)
                <tr class="hover:bg-indigo-50 transition">

                    <!-- ID -->
                    <td class="p-4 font-semibold text-gray-600">
                        {{ $item->id }}
                    </td>

                    <!-- IMAGE -->
                    <td class="p-4">
                        @if($item->image)
                        <img src="{{ asset('uploads/banners/' . $item->image) }}"
                             class="w-20 h-12 object-cover rounded-lg border shadow">
                        @endif
                    </td>

                    <!-- NAME -->
                    <td class="p-4 font-semibold text-gray-800">
                        {{ $item->name }}
                    </td>

                    <!-- LINK -->
                    <td class="p-4 text-blue-600 underline">
                        <a href="{{ $item->link }}" target="_blank">
                            {{ Str::limit($item->link, 30) }}
                        </a>
                    </td>

                    <!-- POSITION -->
                    <td class="p-4">
                        @if($item->position == 'slideshow')
                            <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-xs">
                                Slideshow
                            </span>
                        @else
                            <span class="bg-yellow-100 text-yellow-600 px-3 py-1 rounded-full text-xs">
                                Advertise
                            </span>
                        @endif
                    </td>

                    <!-- SORT -->
                    <td class="p-4 text-center text-gray-700">
                        {{ $item->sort_order }}
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
    <div class="flex gap-2 justify-center">

        <!-- XEM -->
        <a href="{{ route('banner.show', $item->id) }}"
           class="bg-blue-500 text-white px-3 py-1 rounded-lg hover:bg-blue-600">
            Xem
        </a>

        <!-- SỬA -->
        <a href="{{ route('banner.edit', $item->id) }}"
           class="bg-yellow-400 px-3 py-1 rounded-lg hover:bg-yellow-500">
            Sửa
        </a>

        <!-- XÓA -->
        <form action="{{ route('banner.destroy', $item->id) }}"
              method="POST"
              onsubmit="return confirm('Xóa banner này?')">

            @csrf
            @method('DELETE')

            <button class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600">
                Xóa
            </button>

        </form>

    </div>
</td>

                </tr>
                @endforeach

            </tbody>

        </table>

    </div>

</div>

</x-layout-admin>
