@if($related_products->count() > 0)
<div class="max-w-7xl mx-auto mt-16 mb-20 p-8
            bg-gradient-to-r from-blue-50 to-blue-100
            rounded-2xl shadow-lg border border-blue-100">

    <h2 class="text-2xl font-bold text-blue-700 mb-8">
        🔗 Sản phẩm liên quan
    </h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

        @foreach ($related_products as $item)
            <x-product-card :product="$item" />
        @endforeach

    </div>

</div>
@endif
