<x-layout-admin>

<div class="max-w-6xl mx-auto p-6">

    {{-- HEADER --}}
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-gray-800">
            🗑 Thùng rác Order Detail
        </h2>

        <a href="{{ route('orderdetail.index') }}"
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
                    <th class="p-3 text-center">Order ID</th>
                    <th class="p-3 text-center">Product ID</th>
                    <th class="p-3 text-center">Price</th>
                    <th class="p-3 text-center">Qty</th>
                    <th class="p-3 text-center">Amount</th>
                    <th class="p-3 text-center">Hành động</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">

                @forelse($orderDetails as $item)

                    <tr class="hover:bg-gray-50 transition">

                        <td class="p-3 text-center font-medium text-gray-600">
                            {{ $item->id }}
                        </td>

                        <td class="p-3 text-center">
                            <span class="px-2 py-1 bg-blue-100 text-blue-600 rounded text-sm">
                                #{{ $item->order_id }}
                            </span>
                        </td>

                        <td class="p-3 text-center text-gray-700">
                            {{ $item->product_id }}
                        </td>

                        <td class="p-3 text-center text-green-600 font-semibold">
                            {{ number_format($item->price) }} đ
                        </td>

                        <td class="p-3 text-center">
                            <span class="px-2 py-1 bg-gray-100 rounded">
                                {{ $item->qty }}
                            </span>
                        </td>

                        <td class="p-3 text-center text-red-500 font-bold">
                            {{ number_format($item->amount) }} đ
                        </td>

                        {{-- ACTION --}}
                        <td class="p-3">

                            <div class="flex justify-center gap-3">

                                {{-- RESTORE --}}
                                <a href="{{ route('orderdetail.restore', $item->id) }}"
                                   class="px-3 py-1 rounded-md bg-green-100 text-green-700 hover:bg-green-200 transition text-sm">
                                    ♻ Khôi phục
                                </a>

                                {{-- DELETE --}}
                                <form action="{{ route('orderdetail.forceDelete', $item->id) }}"
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
                        <td colspan="7" class="text-center p-8 text-gray-500">
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
    <div class="mt-6 flex justify-center">
        <div class="bg-white p-3 rounded-lg shadow">
            {{ $orderDetails->links() }}
        </div>
    </div>

</div>

</x-layout-admin>
