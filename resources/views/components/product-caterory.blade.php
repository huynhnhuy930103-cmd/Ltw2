<div class="max-w-7xl mx-auto mt-16 bg-[#b7e4c7] p-8 rounded-2xl shadow">

    <h2 class="text-3xl font-bold text-black text-center mb-6">
        🌿 {{ $category->name ?? 'Sản phẩm' }}
    </h2>

    <div class="grid grid-cols-4 gap-8">

        @foreach ($products as $item)
            <x-product-card :product="$item" />
        @endforeach

    </div>

</div>
