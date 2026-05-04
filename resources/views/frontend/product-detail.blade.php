<x-layout-site title="{{ $product->name }}">

    <div class="max-w-6xl mx-auto mt-10 grid grid-cols-1 md:grid-cols-2 gap-10">

        <!-- IMAGE -->
         <div class="relative overflow-hidden">
                                <img src="{{ $product->image
            ? asset('storage/' . $product->image)
            : 'https://picsum.photos/300/250' }}"
                                    class="w-full h-56 object-contain bg-gray-100 p-3 transition duration-300 group-hover:scale-110">


                            </div>

        <!-- INFO -->
        <div class="bg-white p-6 rounded-2xl shadow">

            <!-- NAME -->
            <h1 class="text-3xl font-bold mb-4 text-gray-800">
                {{ $product->name }}
            </h1>

            <!-- PRICE -->
            <p class="text-red-500 text-2xl font-semibold mb-4">
                {{ number_format($product->price_buy) }} đ
            </p>

            <!-- DESCRIPTION -->
            <p class="text-gray-600 mb-6">
                {{ $product->detail ?? 'Đang cập nhật mô tả...' }}
            </p>

            <!-- QUANTITY -->
            <div class="mb-6">
                <label class="block mb-2 font-semibold text-gray-700">
                    Số lượng
                </label>
                <input
                    type="number"
                    value="1"
                    min="1"
                    class="w-20 border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <!-- BUTTON -->
            <a href="/them-gio/{{ $product->id }}"
                class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-xl font-semibold transition inline-block">
                🛒 Thêm vào giỏ
            </a>

        </div>

    </div>

    <!-- 👉 SẢN PHẨM LIÊN QUAN -->
    <x-product-related :product="$product" />

</x-layout-site>
