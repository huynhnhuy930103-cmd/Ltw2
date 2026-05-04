<x-layout-admin>

<div class="min-h-screen bg-gray-100 p-6">

    <div class="max-w-7xl mx-auto bg-white p-6 rounded-2xl shadow">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">
                🖼️ Quản lý banner
            </h2>

            <a href="{{ route('banner.create') }}"
               class="px-5 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">
                ➕ Thêm banner
            </a>
        </div>

        <!-- TABLE -->
        <div class="overflow-x-auto">

            <table class="w-full border">

                <thead class="bg-gray-100 text-left">
                    <tr>
                        <th class="p-3 border">ID</th>
                        <th class="p-3 border">Hình ảnh</th>
                        <th class="p-3 border">Tên</th>
                        <th class="p-3 border">Link</th>
                        <th class="p-3 border">Vị trí</th>
                        <th class="p-3 border">Thứ tự</th>
                        <th class="p-3 border">Trạng thái</th>
                        <th class="p-3 border text-center">Hành động</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($banners as $item)

                    <tr class="border-t hover:bg-gray-50">

                        <!-- ID -->
                        <td class="p-3 border">
                            {{ $item->id }}
                        </td>

                        <!-- IMAGE -->
                        <td class="p-3 border">
                            <img src="{{ asset('uploads/banners/' . $item->image) }}"
                                 class="w-16 h-16 object-cover rounded-lg border">
                        </td>

                        <!-- NAME -->
                        <td class="p-3 border font-semibold">
                            {{ $item->name }}
                        </td>

                        <!-- LINK -->
                        <td class="p-3 border text-blue-500">
                            <a href="{{ $item->link }}" target="_blank">
                                {{ Str::limit($item->link, 30) }}
                            </a>
                        </td>

                        <!-- POSITION -->
                        <td class="p-3 border">
                            <span class="px-2 py-1 rounded text-xs
                                {{ $item->position == 'slideshow' ? 'bg-blue-100 text-blue-600' : 'bg-yellow-100 text-yellow-600' }}">
                                {{ $item->position }}
                            </span>
                        </td>

                        <!-- SORT -->
                        <td class="p-3 border text-center">
                            {{ $item->sort_order }}
                        </td>

                        <!-- STATUS -->
                        <td class="p-3 border">
                            @if($item->status == 1)
                                <span class="text-green-600 font-semibold">✔ Hiển thị</span>
                            @else
                                <span class="text-red-500 font-semibold">⛔ Ẩn</span>
                            @endif
                        </td>

                        <!-- ACTION -->
                        <td class="p-3 border text-center space-x-2">

                            <a href="{{ route('banner.edit', $item->id) }}"
                               class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">
                                Sửa
                            </a>

                            <form action="{{ route('banner.destroy', $item->id) }}"
                                  method="POST"
                                  class="inline-block"
                                  onsubmit="return confirm('Xóa banner này?')">

                                @csrf
                                @method('DELETE')

                                <button class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                                    Xóa
                                </button>

                            </form>

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

</x-layout-admin>
