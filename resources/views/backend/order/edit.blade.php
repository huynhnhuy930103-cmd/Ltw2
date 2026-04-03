<x-layout-admin>

    <h2 class="text-2xl font-bold mb-6">Cập nhật đơn hàng</h2>

    <form action="{{ route('order.update', $order->id) }}" method="POST" class="space-y-4 bg-white p-6 rounded shadow">

        @csrf
        @method('PUT')

        <input type="hidden" name="user_id" value="{{ $order->user_id }}">

        <div>
            <label>Họ tên</label>
            <input name="name" value="{{ $order->name }}" class="border w-full p-2 rounded">
        </div>

        <div>
            <label>SĐT</label>
            <input name="phone" value="{{ $order->phone }}" class="border w-full p-2 rounded">
        </div>

        <div>
            <label>Email</label>
            <input name="email" value="{{ $order->email }}" class="border w-full p-2 rounded">
        </div>

        <div>
            <label>Địa chỉ</label>
            <input name="address" value="{{ $order->address }}" class="border w-full p-2 rounded">
        </div>

        <div>
            <label>Ghi chú</label>
            <textarea name="note" class="border w-full p-2 rounded">{{ $order->note }}</textarea>
        </div>

        <div>
            <label>Trạng thái</label>
            <select name="status" class="border w-full p-2 rounded">
                <option value="2" {{ $order->status == 2 ? 'selected' : '' }}>Chờ xử lý</option>
                <option value="1" {{ $order->status == 1 ? 'selected' : '' }}>Hoàn tất</option>
            </select>
        </div>

        <div class="flex gap-3">
            <button class="bg-green-600 text-white px-4 py-2 rounded">
                Cập nhật
            </button>

            <a href="{{ route('order.index') }}" class="text-blue-500">
                ← Quay lại
            </a>
        </div>

    </form>

</x-layout-admin>
