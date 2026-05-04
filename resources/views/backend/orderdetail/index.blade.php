<x-layout-admin>

<div class="min-h-screen bg-gradient-to-br from-blue-50 via-gray-50 to-indigo-100 p-6">

    <div class="max-w-7xl mx-auto bg-white/80 backdrop-blur-md p-8 rounded-2xl shadow-xl border">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-gray-800">
                📦 Order Detail
            </h2>

            <a href="{{ route('orderdetail.create') }}"
               class="px-5 py-2 rounded-lg bg-gradient-to-r from-green-500 to-emerald-500 text-white hover:scale-105 transition shadow-lg">
                + Create
            </a>
        </div>

        <!-- TABLE -->
        <div class="overflow-x-auto rounded-xl border">

            <table class="w-full text-left">

                <!-- HEAD -->
                <thead class="bg-gray-100 text-gray-700 uppercase text-sm">
                    <tr>
                        <th class="p-4 border">ID</th>
                        <th class="p-4 border">Order ID</th>
                        <th class="p-4 border">Product ID</th>
                        <th class="p-4 border">Price</th>
                        <th class="p-4 border">Qty</th>
                        <th class="p-4 border">Amount</th>
                        <th class="p-4 border text-center">Action</th>
                    </tr>
                </thead>

                <!-- BODY -->
                <tbody>

                    @foreach($orderDetails as $item)

                    <tr class="border-t hover:bg-gray-50 transition">

                        <td class="p-4 border font-semibold text-gray-700">
                            {{ $item->id }}
                        </td>

                        <td class="p-4 border">
                            <span class="px-2 py-1 bg-blue-100 text-blue-600 rounded text-sm">
                                #{{ $item->order_id }}
                            </span>
                        </td>

                        <td class="p-4 border">
                            {{ $item->product_id }}
                        </td>

                        <td class="p-4 border text-green-600 font-semibold">
                            {{ number_format($item->price) }} đ
                        </td>

                        <td class="p-4 border">
                            <span class="px-2 py-1 bg-gray-100 rounded">
                                {{ $item->qty }}
                            </span>
                        </td>

                        <td class="p-4 border text-red-500 font-bold">
                            {{ number_format($item->amount) }} đ
                        </td>

                        <!-- ACTION -->
                        <td class="p-4 border">

                            <div class="flex justify-center gap-2">

                                <a href="{{ route('orderdetail.edit', $item->id) }}"
                                   class="px-3 py-1 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                                    Edit
                                </a>

                                <form action="{{ route('admin.orderdetail.delete', $item->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Xóa order detail này?')">

                                    @csrf
                                    @method('DELETE')

                                    <button class="px-3 py-1 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">
                                        Delete
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

</div>

</x-layout-admin>
