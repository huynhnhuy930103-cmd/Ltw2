<x-layout-admin>

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Order Detail</h2>

        <a href="{{ route('orderdetail.create') }}"
           class="bg-green-600 text-white px-4 py-2 rounded">
            + Create
        </a>
    </div>

    <div class="bg-white shadow rounded-xl overflow-hidden">
        <table class="w-full text-left border-collapse">

            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3">ID</th>
                    <th class="p-3">Order ID</th>
                    <th class="p-3">Product ID</th>
                    <th class="p-3">Price</th>
                    <th class="p-3">Qty</th>
                    <th class="p-3">Amount</th>
                    <th class="p-3">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($orderDetails as $item)
                <tr class="border-t">
                    <td class="p-3">{{ $item->id }}</td>
                    <td class="p-3">{{ $item->order_id }}</td>
                    <td class="p-3">{{ $item->product_id }}</td>
                    <td class="p-3">{{ $item->price }}</td>
                    <td class="p-3">{{ $item->qty }}</td>
                    <td class="p-3">{{ $item->amount }}</td>

                    <td class="p-3 flex gap-2">
                        <a href="{{ route('orderdetail.edit', $item->id) }}"
                           class="bg-blue-500 text-white px-3 py-1 rounded">
                            Edit
                        </a>

                        <form action="{{ route('admin.orderdetail.delete', $item->id) }}"
                              method="POST"
                              onsubmit="return confirm('Xóa?')">
                            @csrf
                            @method('DELETE')

                            <button class="bg-red-500 text-white px-3 py-1 rounded">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

</x-layout-admin>