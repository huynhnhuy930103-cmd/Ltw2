<x-layout-site title="Thanh toán">

<div class="max-w-7xl mx-auto mt-10 grid grid-cols-1 lg:grid-cols-2 gap-10">

    <!-- FORM -->
    <div class="bg-white p-6 rounded-2xl shadow">

        <h2 class="text-2xl font-bold text-blue-700 mb-6">
            🧾 Thông tin khách hàng
        </h2>

        <form action="{{ route('checkout.store') }}" method="POST">
            @csrf

            <input type="text" name="name" placeholder="Họ tên"
                class="w-full border p-3 rounded-lg mb-4">

            <input type="text" name="phone" placeholder="Số điện thoại"
                class="w-full border p-3 rounded-lg mb-4">

            <input type="text" name="address" placeholder="Địa chỉ"
                class="w-full border p-3 rounded-lg mb-4">

            <button
                class="w-full bg-orange-500 hover:bg-orange-600 text-white py-3 rounded-xl font-semibold">
                Đặt hàng
            </button>
        </form>

    </div>

    <!-- CART -->
    <div class="bg-white p-6 rounded-2xl shadow">

        <h2 class="text-2xl font-bold text-blue-700 mb-6">
            🛒 Đơn hàng của bạn
        </h2>

        @php $total = 0; @endphp

        @foreach($cart as $item)
            @php
                $subtotal = $item['price'] * $item['qty'];
                $total += $subtotal;
            @endphp

            <div class="flex justify-between mb-4 border-b pb-2">
                <div>
                    <p class="font-semibold">{{ $item['name'] }}</p>
                    <p class="text-sm text-gray-500">SL: {{ $item['qty'] }}</p>
                </div>
                <p class="text-red-500 font-semibold">
                    {{ number_format($subtotal) }} đ
                </p>
            </div>
        @endforeach

        <div class="mt-6 text-right">
            <h3 class="text-xl font-bold">
                Tổng: <span class="text-red-500">{{ number_format($total) }} đ</span>
            </h3>
        </div>

    </div>

</div>

</x-layout-site>
