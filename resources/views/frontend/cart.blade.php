<x-layout-site title="Giỏ hàng">

<div class="max-w-7xl mx-auto mt-10">

    <h1 class="text-3xl font-bold text-blue-700 mb-8">
        🛒 Giỏ hàng của bạn
    </h1>

    @if(count($cart) > 0)

    <div class="bg-white rounded-2xl shadow p-6">

        <table class="w-full text-center">
            <thead>
                <tr class="border-b">
                    <th class="p-3">
                        <input type="checkbox" id="check-all">
                    </th>
                    <th class="p-3">Ảnh</th>
                    <th class="p-3">Tên</th>
                    <th class="p-3">Giá</th>
                    <th class="p-3">Số lượng</th>
                    <th class="p-3">Tổng</th>
                    <th class="p-3">Xoá</th>
                </tr>
            </thead>

            <tbody>
                @foreach($cart as $id => $item)
                @php $subtotal = $item['price'] * $item['qty']; @endphp

                <tr class="border-b">
                    <td>
                        <input type="checkbox" class="item-check"
                            data-price="{{ $item['price'] }}"
                            data-qty="{{ $item['qty'] }}">
                    </td>

                    <td class="p-3">
                        <img src="{{ asset('img/' . $item['image']) }}" class="w-20 mx-auto">
                    </td>

                    <td class="p-3">{{ $item['name'] }}</td>

                    <td class="p-3 text-red-500">
                        {{ number_format($item['price']) }} đ
                    </td>

                    <td class="p-3">
                        <form action="/cap-nhat-gio/{{ $id }}" method="POST">
                            @csrf
                            <input type="number" name="qty" value="{{ $item['qty'] }}" min="1"
                                class="w-16 border rounded text-center">
                            <button class="ml-2 text-blue-600">Cập nhật</button>
                        </form>
                    </td>

                    <td class="p-3 font-semibold">
                        {{ number_format($subtotal) }} đ
                    </td>

                    <td class="p-3">
                        <a href="/xoa-gio/{{ $id }}" class="text-red-500">X</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- TOTAL -->
        <div class="text-right mt-6">
            <h2 class="text-xl font-bold">
                Tổng tiền:
                <span id="total-price" class="text-red-500">0 đ</span>
            </h2>
        </div>

        <!-- BUTTON -->
        <div class="text-right mt-6">
            <a href="/thanh-toan"
                class="bg-blue-600 text-white px-6 py-3 rounded-xl hover:bg-blue-700">
                Thanh toán
            </a>
        </div>

    </div>

    @else

    <div class="text-center text-gray-500 mt-10">
        🛒 Giỏ hàng trống
    </div>

    @endif

</div>

<!-- JS -->
<script>
    const checkAll = document.getElementById('check-all');
    const items = document.querySelectorAll('.item-check');
    const totalEl = document.getElementById('total-price');

    function updateTotal() {
        let total = 0;
        items.forEach(item => {
            if (item.checked) {
                let price = parseInt(item.dataset.price);
                let qty = parseInt(item.dataset.qty);
                total += price * qty;
            }
        });
        totalEl.innerText = total.toLocaleString() + ' đ';
    }

    // check all
    checkAll.addEventListener('change', function() {
        items.forEach(item => item.checked = this.checked);
        updateTotal();
    });

    // từng item
    items.forEach(item => {
        item.addEventListener('change', updateTotal);
    });
</script>

</x-layout-site>
