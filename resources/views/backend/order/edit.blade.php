<x-layout-admin>

<div class="min-h-screen bg-gradient-to-br from-slate-100 via-blue-50 to-indigo-100 p-6">

    <div class="max-w-4xl mx-auto bg-white/80 backdrop-blur-md p-8 rounded-2xl shadow-xl border border-gray-200">

        <!-- TITLE -->
        <h2 class="text-3xl font-bold text-gray-800 mb-6">
            ✏️ Cập nhật đơn hàng {{ $order->id }}
        </h2>

        <form action="{{ route('order.update', $order->id) }}" method="POST" class="grid grid-cols-2 gap-6">
            @csrf
            @method('PUT')

            <input type="hidden" name="user_id" value="{{ $order->user_id }}">

            <!-- NAME -->
            <div>
                <label class="text-sm text-gray-600">Họ tên</label>
                <input name="name"
                       value="{{ $order->name }}"
                       class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400 outline-none">
            </div>

            <!-- PHONE -->
            <div>
                <label class="text-sm text-gray-600">SĐT</label>
                <input name="phone"
                       value="{{ $order->phone }}"
                       class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400 outline-none">
            </div>

            <!-- EMAIL -->
            <div>
                <label class="text-sm text-gray-600">Email</label>
                <input name="email"
                       value="{{ $order->email }}"
                       class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400 outline-none">
            </div>

            <!-- STATUS -->
            <div>
                <label class="text-sm text-gray-600">Trạng thái</label>
                <select name="status"
                        class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400">
                    <option value="2" {{ $order->status == 2 ? 'selected' : '' }}>
                        ⏳ Chờ xử lý
                    </option>
                    <option value="1" {{ $order->status == 1 ? 'selected' : '' }}>
                        ✔ Hoàn tất
                    </option>
                </select>
            </div>

            <!-- ADDRESS -->
            <div class="col-span-2">
                <label class="text-sm text-gray-600">Địa chỉ</label>
                <input name="address"
                       value="{{ $order->address }}"
                       class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400 outline-none">
            </div>

            <!-- NOTE -->
            <div class="col-span-2">
                <label class="text-sm text-gray-600">Ghi chú</label>
                <textarea name="note" rows="3"
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400 outline-none">{{ $order->note }}</textarea>
            </div>

            <!-- BUTTON -->
            <div class="col-span-2 flex justify-end gap-3 mt-4">

                <a href="{{ route('order.index') }}"
                   class="px-5 py-2 rounded-lg bg-gray-400 text-white hover:bg-gray-500">
                    ← Quay lại
                </a>

                <button
                    class="px-6 py-2 rounded-lg text-white bg-gradient-to-r from-green-500 to-emerald-500 hover:scale-105 transition shadow-lg">
                    💾 Cập nhật
                </button>

            </div>

        </form>

    </div>

</div>

</x-layout-admin>
