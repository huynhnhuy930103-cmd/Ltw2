@props(['product'])

<div class="max-w-7xl mx-auto mt-16 bg-gradient-to-r from-blue-50 to-blue-100 p-8 rounded-2xl shadow-lg border border-blue-100">

    <h2 class="text-3xl font-bold text-blue-700 text-center mb-8">
        🆕 Sản phẩm mới nhất
    </h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">

        @foreach ($product as $item)
            <x-product-card :product="$item" />
        @endforeach

    </div>

</div>