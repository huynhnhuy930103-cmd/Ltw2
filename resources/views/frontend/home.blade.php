<script src="https://cdn.tailwindcss.com"></script>

<style>
    @keyframes slide-infinite {
        0%, 15% { transform: translateX(0); }
        20%, 35% { transform: translateX(-100%); }
        40%, 55% { transform: translateX(-200%); }
        60%, 75% { transform: translateX(-300%); }
        80%, 95% { transform: translateX(-400%); }
        100% { transform: translateX(0); } /* Quay về đầu */
    }

    .animate-infinite-slideshow {
        display: flex;
        width: 500%; /* Đủ chỗ cho 5 ảnh */
        animation: slide-infinite 20s infinite ease-in-out;
    }

    .slide-item {
        width: 100%; /* Mỗi slide con chiếm đúng chiều rộng khung nhìn */
        flex-shrink: 0; /* NGĂN không cho ảnh bị co lại (Cực kỳ quan trọng) */
    }
</style>

<x-layout-site title="Trang chủ">
    <!-- <div class="relative w-full overflow-hidden shadow-lg">
        <div class="animate-banner">
            @for ($i = 1; $i <= 5; $i++)
                <img src="{{ asset('img/banner' . $i . '.jpg') }}"
                     class="w-screen h-[400px] object-cover"
                     alt="Banner {{ $i }}">
            @endfor
        </div>
    </div> -->
    <x-slider />

    <div class="max-w-7xl mx-auto my-10 p-6 bg-[#F8F3E1] rounded-2xl shadow-inner">

        <div class="mb-16">
            <h2 class="text-center text-3xl font-extrabold mb-10 text-gray-800 border-b-4 border-orange-500 w-fit mx-auto pb-2">
                Điện thoại nổi bật 📱
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse ($list_phone as $product)
                    <div class="bg-white p-5 rounded-2xl text-center shadow-md hover:-translate-y-3 hover:shadow-2xl transition-all duration-300 group">
                        <div class="overflow-hidden rounded-xl mb-4">
                            <img src="{{ asset('img/' . $product->image) }}"
                                 class="w-full h-48 object-contain group-hover:scale-110 transition-transform duration-500"
                                 alt="{{ $product->name }}">
                        </div>

                        <h3 class="font-bold text-lg text-gray-700 truncate">{{ $product->name }}</h3>

                        <p class="text-orange-600 font-black text-2xl my-3">
                            {{ number_format($product->price_buy, 0, ',', '.') }}đ
                        </p>

                        <button onclick="addToCart('{{ $product->name }}', '{{ $product->price_buy }}')"
                                class="w-full bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 rounded-xl shadow-lg shadow-orange-200 transition-all active:scale-95 flex items-center justify-center gap-2">
                            🛒 Thêm vào giỏ
                        </button>
                    </div>
                @empty
                    <p class="col-span-full text-center text-gray-400 italic">Đang cập nhật sản phẩm điện thoại...</p>
                @endforelse
            </div>
        </div>

        <div>
            <h2 class="text-center text-3xl font-extrabold mb-10 text-gray-800 border-b-4 border-blue-500 w-fit mx-auto pb-2">
                Laptop nổi bật 💻
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse ($list_laptop as $product)
                    <div class="bg-white p-5 rounded-2xl text-center shadow-md hover:-translate-y-3 hover:shadow-2xl transition-all duration-300 group">
                        <div class="overflow-hidden rounded-xl mb-4">
                            <img src="{{ asset('img/' . $product->image) }}"
                                 class="w-full h-48 object-contain group-hover:scale-110 transition-transform duration-500"
                                 alt="{{ $product->name }}">
                        </div>

                        <h3 class="font-bold text-lg text-gray-700 truncate">{{ $product->name }}</h3>

                        <p class="text-blue-600 font-black text-2xl my-3">
                            {{ number_format($product->price_buy, 0, ',', '.') }}đ
                        </p>

                        <button onclick="addToCart('{{ $product->name }}', '{{ $product->price_buy }}')"
                                class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 rounded-xl shadow-lg shadow-blue-200 transition-all active:scale-95 flex items-center justify-center gap-2">
                            🛒 Thêm vào giỏ
                        </button>
                    </div>
                @empty
                    <p class="col-span-full text-center text-gray-400 italic">Đang cập nhật sản phẩm laptop...</p>
                @endforelse
            </div>
        </div>

        
    </div>
</x-layout-site>

<script>
    function addToCart(name, price) {
        const formattedPrice = Number(price).toLocaleString('vi-VN');
        alert(`✅ Đã thêm thành công!\nSản phẩm: ${name}\nGiá: ${formattedPrice}đ`);
    }
</script>
