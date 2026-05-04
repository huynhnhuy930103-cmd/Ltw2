@props(['product'])

<div class="max-w-7xl mx-auto mt-16 mb-20 bg-gradient-to-r from-red-50 to-orange-50 p-8 rounded-2xl shadow-lg border border-red-100">

    <h2 class="text-3xl font-bold text-red-600 text-center mb-8">
        🔥 Sản phẩm khuyến mãi
    </h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">

        @foreach ($product as $item)
            <x-product-card :product="$item" />
        @endforeach

    </div>

</div>