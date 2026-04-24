<!-- <div class="bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col h-full overflow-hidden group">
    <div class="relative aspect-square bg-gray-50 flex items-center justify-center p-4">
        <img class="w-full h-full object-contain group-hover:scale-110 transition-transform duration-500"
             src="{{ asset('img/' . ($product->image ?? 'product.webp')) }}"
             alt="{{ $product->name }}"
             onerror="this.src='https://picsum.photos/400/400?random={{ $product->id }}'">

        <div class="absolute top-2 left-2 bg-blue-600 text-white text-[10px] font-bold px-2 py-1 rounded-md uppercase">New</div>
    </div>

    <div class="p-4 flex flex-col flex-grow">
        <h3 class="font-bold text-gray-800 text-base mb-2 line-clamp-2 group-hover:text-blue-600 transition-colors">
            {{ $product->name }}
        </h3>

        <div class="mt-auto">
            <div class="flex flex-col mb-3">
                <span class="text-xs text-gray-400 line-through">{{ number_format($product->price ?? 0, 0, ',', '.') }}đ</span>
                <span class="text-blue-600 font-black text-lg leading-none">{{ number_format($product->price_buy, 0, ',', '.') }}đ</span>
            </div>

            <button class="w-full bg-gray-900 text-white py-2.5 rounded-xl font-bold text-sm hover:bg-blue-600 active:scale-95 transition-all flex items-center justify-center gap-2">
                <i class="fa fa-shopping-cart text-xs"></i>
                Thêm vào giỏ
            </button>
        </div>
    </div>
</div> -->



<a href="{{ route('site.product.detail', ['slug' => $product->slug]) }}"
    class="block bg-white p-4 rounded-xl hover:-translate-y-1 hover:shadow-lg transition group">

    {{-- IMAGE --}}
    <div class="overflow-hidden rounded-lg">
        <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('images/no-image.png') }}"
            class="w-full h-56 object-cover group-hover:scale-105 transition duration-300">
    </div>

    {{-- NAME --}}
    <div class="mt-4 text-sm text-gray-600 line-clamp-2 min-h-10">
        {{ $product->name }}
    </div>

    {{-- PRICE --}}
    <div class="mt-2">
        @if ($product->price_sale && $product->price_sale > 0)
        <div class="text-gray-400 line-through text-sm">
            {{ number_format($product->price_buy) }}đ
        </div>

        <div class="text-lg font-bold text-red-600">
            {{ number_format($product->price_sale) }}đ
        </div>
        @else
        <div class="text-lg font-bold text-green-800">
            {{ number_format($product->price_buy) }}đ
        </div>
        @endif
    </div>

    {{-- BUTTON --}}
    <div
    class="mt-4 w-full bg-blue-600 text-white font-semibold py-2 rounded-lg text-center
           hover:bg-blue-700 hover:shadow-md hover:-translate-y-0.5 transition duration-200">
    Xem chi tiết
</div>
</a>
