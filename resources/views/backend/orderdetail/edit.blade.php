<x-layout-admin>

    <h2 class="text-2xl font-bold mb-6">Cập nhật Order Detail</h2>

    <form action="{{ route('orderdetail.update', $item->id) }}" method="POST"
        class="space-y-5 bg-white p-6 rounded-xl shadow">

        @csrf

        {{-- order_id --}}
        <div>
            <label class="block mb-1 font-semibold">Order ID</label>
            <input type="number" name="order_id" value="{{ $item->order_id }}" class="border w-full px-3 py-2 rounded">
        </div>

        {{-- product_id --}}
        <div>
            <label class="block mb-1 font-semibold">Product ID</label>
            <input type="number" name="product_id" value="{{ $item->product_id }}"
                class="border w-full px-3 py-2 rounded">
        </div>

        {{-- price --}}
        <div>
            <label class="block mb-1 font-semibold">Giá</label>
            <input type="number" name="price" id="price" value="{{ $item->price }}"
                class="border w-full px-3 py-2 rounded">
        </div>

        {{-- qty --}}
        <div>
            <label class="block mb-1 font-semibold">Số lượng</label>
            <input type="number" name="qty" id="qty" value="{{ $item->qty }}"
                class="border w-full px-3 py-2 rounded">
        </div>

        {{-- amount --}}
        <div>
            <label class="block mb-1 font-semibold">Tổng tiền</label>
            <input type="number" name="amount" id="amount" value="{{ $item->amount }}" readonly
                class="border w-full px-3 py-2 rounded bg-gray-100">
        </div>

        {{-- buttons --}}
        <div class="flex gap-3">
            <button class="bg-green-600 text-white px-5 py-2 rounded">
                Cập nhật
            </button>

            <a href="{{ route('orderdetail.index') }}" class="text-blue-500">
                ← Quay lại
            </a>
        </div>

    </form>

    {{-- auto tính lại tiền --}}
    <script>
        function calcAmount() {
            let price = document.getElementById('price').value;
            let qty = document.getElementById('qty').value;

            let amount = price * qty;

            if (!isNaN(amount)) {
                document.getElementById('amount').value = amount;
            }
        }

        document.getElementById('price').addEventListener('input', calcAmount);
        document.getElementById('qty').addEventListener('input', calcAmount);
    </script>

</x-layout-admin>
