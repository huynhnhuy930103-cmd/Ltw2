<x-layout-admin>

    <h2 class="text-2xl font-bold mb-6">Tạo đơn hàng</h2>

    <form action="{{ route('order.store') }}" method="POST" class="space-y-4 bg-white p-6 rounded shadow">

        @csrf

        <input type="hidden" name="user_id" value="1">

        <div>
            <label>Họ tên</label>
            <input name="name" class="border w-full p-2 rounded">
        </div>

        <div>
            <label>SĐT</label>
            <input name="phone" class="border w-full p-2 rounded">
        </div>

        <div>
            <label>Email</label>
            <input name="email" class="border w-full p-2 rounded">
        </div>

        <div>
            <label>Địa chỉ</label>
            <input name="address" class="border w-full p-2 rounded">
        </div>

        <div>
            <label>Ghi chú</label>
            <textarea name="note" class="border w-full p-2 rounded"></textarea>
        </div>

        <div>
            <label>Trạng thái</label>
            <select name="status" class="border w-full p-2 rounded">
                <option value="2">Chờ xử lý</option>
                <option value="1">Hoàn tất</option>
            </select>
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">
            Tạo đơn
        </button>

    </form>

</x-layout-admin>
