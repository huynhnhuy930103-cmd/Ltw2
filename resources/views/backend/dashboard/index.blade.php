<x-layout-admin title="Dashboard">

    <!-- STATS -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-6">

        <div class="bg-white p-5 rounded-xl shadow text-center">
            <h3 class="text-3xl font-bold text-blue-500">
                {{ $productCount }}
            </h3>
            <p class="text-gray-500 mt-1">Sản phẩm</p>
        </div>

        <div class="bg-white p-5 rounded-xl shadow text-center">
            <h3 class="text-3xl font-bold text-green-500">
                {{ $userCount }}
            </h3>
            <p class="text-gray-500 mt-1">Người dùng</p>
        </div>

        <div class="bg-white p-5 rounded-xl shadow text-center">
            <h3 class="text-3xl font-bold text-purple-500">--</h3>
            <p class="text-gray-500 mt-1">Doanh thu</p>
        </div>

        <div class="bg-white p-5 rounded-xl shadow text-center">
            <h3 class="text-3xl font-bold text-red-500">--</h3>
            <p class="text-gray-500 mt-1">Đơn hàng</p>
        </div>

    </div>

    <!-- PRODUCT TABLE -->
    <div class="bg-white rounded-xl shadow overflow-hidden">

        <div class="flex justify-between items-center p-4 border-b">
            <h2 class="font-semibold text-gray-700">Sản phẩm mới</h2>

            <a href="{{ route('product.index') }}"
                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg text-sm">
                Xem tất cả
            </a>
        </div>

        <table class="w-full text-sm text-gray-700">
            <thead class="bg-gray-200 text-xs uppercase">
                <tr>
                    <th class="p-3">ID</th>
                    <th class="p-3">Tên</th>
                    <th class="p-3">Giá</th>
                    <th class="p-3">Trạng thái</th>
                </tr>
            </thead>

            <tbody class="divide-y">
                @foreach($products as $item)
                <tr class="hover:bg-gray-50">

                    <td class="p-3 text-center">{{ $item->id }}</td>

                    <td class="p-3 text-center font-medium">
                        {{ $item->name }}
                    </td>

                    <td class="p-3 text-center text-green-600">
                        {{ number_format($item->price_buy) }}đ
                    </td>

                    <td class="p-3 text-center">
                        @if($item->status)
                            <span class="px-3 py-1 text-xs rounded-full bg-green-100 text-green-600">
                                Hiện
                            </span>
                        @else
                            <span class="px-3 py-1 text-xs rounded-full bg-gray-200 text-gray-600">
                                Ẩn
                            </span>
                        @endif
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</x-layout-admin>
