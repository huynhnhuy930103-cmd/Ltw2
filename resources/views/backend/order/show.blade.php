<x-layout-admin>

    <h2 class="text-2xl font-bold mb-6">Chi tiết đơn hàng</h2>

    <div class="bg-white p-6 rounded shadow space-y-3">

        <div><b>ID:</b> {{ $order->id }}</div>
        <div><b>Họ tên:</b> {{ $order->name }}</div>
        <div><b>SĐT:</b> {{ $order->phone }}</div>
        <div><b>Email:</b> {{ $order->email }}</div>
        <div><b>Địa chỉ:</b> {{ $order->address }}</div>
        <div><b>Ghi chú:</b> {{ $order->note }}</div>

        <div>
            <b>Trạng thái:</b>
            <span class="px-2 py-1 rounded text-white
                {{ $order->status == 1 ? 'bg-green-500' : 'bg-gray-400' }}">
                {{ $order->status == 1 ? 'Hoàn tất' : 'Chờ xử lý' }}
            </span>
        </div>

    </div>

    <div class="mt-4">
        <a href="{{ route('order.index') }}" class="text-blue-500">
            ← Quay lại
        </a>
    </div>

</x-layout-admin>