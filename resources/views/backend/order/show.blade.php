<x-layout-admin>

<div class="min-h-screen bg-gradient-to-br from-slate-100 via-blue-50 to-indigo-100 p-6">

    <div class="max-w-4xl mx-auto bg-white/80 backdrop-blur-md p-8 rounded-2xl shadow-xl border border-gray-200">

        <!-- TITLE -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-gray-800">
                📦 Chi tiết đơn hàng {{ $order->id }}
            </h2>

            <!-- STATUS -->
            @if($order->status == 1)
                <span class="bg-green-100 text-green-600 px-4 py-1 rounded-full text-sm">
                    ✔ Hoàn tất
                </span>
            @else
                <span class="bg-yellow-100 text-yellow-600 px-4 py-1 rounded-full text-sm">
                    ⏳ Chờ xử lý
                </span>
            @endif
        </div>

        <!-- INFO GRID -->
        <div class="grid grid-cols-2 gap-6">

            <div>
                <label class="text-sm text-gray-500">Họ tên</label>
                <div class="font-semibold text-gray-800">
                    {{ $order->name }}
                </div>
            </div>

            <div>
                <label class="text-sm text-gray-500">SĐT</label>
                <div class="text-gray-700">
                    {{ $order->phone }}
                </div>
            </div>

            <div>
                <label class="text-sm text-gray-500">Email</label>
                <div class="text-gray-700">
                    {{ $order->email }}
                </div>
            </div>

            <div>
                <label class="text-sm text-gray-500">Địa chỉ</label>
                <div class="text-gray-700">
                    {{ $order->address }}
                </div>
            </div>

        </div>

        <!-- NOTE -->
        <div class="mt-6">
            <label class="text-sm text-gray-500">Ghi chú</label>
            <div class="bg-gray-100 p-4 rounded-lg text-gray-700">
                {{ $order->note ?? 'Không có ghi chú' }}
            </div>
        </div>

        <!-- ACTION -->
        <div class="mt-6 flex justify-between items-center">

            <a href="{{ route('order.index') }}"
               class="px-5 py-2 rounded-lg bg-gray-400 text-white hover:bg-gray-500">
                ← Quay lại
            </a>

            <a href="{{ route('order.edit', $order->id) }}"
               class="px-5 py-2 rounded-lg bg-gradient-to-r from-blue-500 to-indigo-500 text-white hover:scale-105 transition shadow">
                ✏️ Chỉnh sửa
            </a>

        </div>

    </div>

</div>

</x-layout-admin>
