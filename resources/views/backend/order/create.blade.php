<x-layout-admin>

<div class="min-h-screen bg-gradient-to-br from-slate-100 via-blue-50 to-indigo-100 p-6">

    <div class="max-w-4xl mx-auto bg-white/80 backdrop-blur-md p-8 rounded-2xl shadow-xl border border-gray-200">

        <!-- TITLE -->
        <h2 class="text-3xl font-bold text-gray-800 mb-6">
            📦 Tạo đơn hàng
        </h2>

        <form action="{{ route('order.store') }}" method="POST" class="grid grid-cols-2 gap-6">
            @csrf

            <input type="hidden" name="user_id" value="1">

            <!-- NAME -->
            <div>
                <label class="text-sm text-gray-600">Họ tên</label>
                <input name="name" value="{{old('name')}}"
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400 outline-none">
                     @if ($errors->has('name'))
                        <p class="text-red-500 text-sm mt-1">{{ $errors->first('name') }}</p>
                    @endif
            </div>

            <!-- PHONE -->
            <div>
                <label class="text-sm text-gray-600">SĐT</label>
                <input name="phone" value="{{old('phone')}}"
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400 outline-none">
            </div>

            <!-- EMAIL -->
            <div>
                <label class="text-sm text-gray-600">Email</label>
                <input name="email" value="{{old('email')}}"
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400 outline-none">
            </div>

            <!-- STATUS -->
            <div>
                <label class="text-sm text-gray-600">Trạng thái</label>
                <select name="status"
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400">
                    <option value="2" {{ old('status') == 2 ? 'selected' : ''}}>⏳ Chờ xử lý</option>
                    <option value="1" {{ old('status') == 1 ? 'selected' : ''}}>✔ Hoàn tất</option>
                </select>
            </div>

            <!-- ADDRESS (FULL WIDTH) -->
            <div class="col-span-2">
                <label class="text-sm text-gray-600">Địa chỉ</label>
                <input name="address" value="{{old('address')}}"
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400 outline-none">
            </div>

            <!-- NOTE -->
            <div class="col-span-2">
                <label class="text-sm text-gray-600">Ghi chú</label>
                <textarea name="note" rows="3"
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400 outline-none"></textarea>
            </div>

            <!-- BUTTON -->
            <div class="col-span-2 flex justify-end gap-3 mt-4">

                <a href="{{ route('order.index') }}"
                    class="px-5 py-2 rounded-lg bg-gray-400 text-white hover:bg-gray-500">
                    ← Quay lại
                </a>

                <button
                    class="px-6 py-2 rounded-lg text-white bg-gradient-to-r from-blue-500 to-indigo-500 hover:scale-105 transition shadow-lg">
                    🚀 Tạo đơn
                </button>

            </div>

        </form>

    </div>

</div>

</x-layout-admin>
