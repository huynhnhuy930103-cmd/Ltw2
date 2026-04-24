<x-layout-admin>

<div class="min-h-screen bg-gradient-to-br from-slate-100 via-blue-50 to-indigo-100 p-6">

    <div class="max-w-6xl mx-auto">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-gray-800">
                📦 Chi tiết sản phẩm {{ $product->id }}
            </h2>

            <div class="flex gap-2">
                <a href="{{ route('product.index') }}"
                   class="px-4 py-2 rounded-lg bg-gray-400 text-white hover:bg-gray-500">
                    ← Quay lại
                </a>

                <a href="{{ route('product.edit', $product->id) }}"
                   class="px-4 py-2 rounded-lg bg-yellow-500 text-white hover:bg-yellow-600">
                    ✏ Sửa
                </a>
            </div>
        </div>

        <!-- MAIN -->
        <div class="grid grid-cols-3 gap-6">

            <!-- IMAGE -->
            <div class="col-span-1 bg-white/80 backdrop-blur p-4 rounded-2xl shadow border">
                @if ($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}"
                         class="w-full h-80 object-cover rounded-xl shadow">
                @else
                    <div class="w-full h-80 flex items-center justify-center bg-gray-100 rounded-xl text-gray-400">
                        No Image
                    </div>
                @endif
            </div>

            <!-- INFO -->
            <div class="col-span-2 bg-white/80 backdrop-blur p-6 rounded-2xl shadow border space-y-4">

                <h3 class="text-2xl font-bold text-gray-800">
                    {{ $product->name }}
                </h3>

                <p class="text-sm text-gray-500">
                    {{ $product->slug }}
                </p>

                <!-- CATEGORY + BRAND -->
                <div class="flex gap-4 text-sm">
                    <span class="px-3 py-1 bg-blue-100 text-blue-600 rounded-full">
                        📂 {{ $product->category->name ?? '---' }}
                    </span>

                    <span class="px-3 py-1 bg-purple-100 text-purple-600 rounded-full">
                        🏷 {{ $product->brand->name ?? '---' }}
                    </span>
                </div>

                <!-- PRICE -->
                <div class="mt-4 space-y-1">
                    <p class="text-gray-500 text-sm">Giá nhập</p>
                    <p class="text-lg text-gray-700 font-semibold">
                        {{ number_format($product->price_buy) }} đ
                    </p>

                    <p class="text-gray-500 text-sm mt-2">Giá bán</p>
                    <p class="text-2xl font-bold text-red-500">
                        {{ $product->price_sale ? number_format($product->price_sale) . ' đ' : '---' }}
                    </p>
                </div>

                <!-- STOCK -->
                <div class="flex items-center gap-4 mt-4">
                    <span class="px-3 py-1 bg-gray-200 rounded-full text-sm">
                        📦 Kho: {{ $product->qty }}
                    </span>

                    <span class="px-3 py-1 rounded-full text-sm text-white
                        {{ $product->status ? 'bg-green-500' : 'bg-gray-400' }}">
                        {{ $product->status ? '✔ Hiển thị' : '⛔ Ẩn' }}
                    </span>
                </div>

                <!-- DATE -->
                <div class="text-sm text-gray-500 mt-4">
                    Ngày tạo: {{ $product->created_at }}
                </div>

            </div>

        </div>

        <!-- DESCRIPTION -->
        <div class="mt-6 grid grid-cols-2 gap-6">

            <!-- DETAIL -->
            <div class="bg-white/80 backdrop-blur p-6 rounded-2xl shadow border">
                <h4 class="font-bold text-gray-700 mb-2">📝 Chi tiết</h4>
                <p class="text-gray-600 leading-relaxed">
                    {{ $product->detail }}
                </p>
            </div>

            <!-- DESCRIPTION -->
            <div class="bg-white/80 backdrop-blur p-6 rounded-2xl shadow border">
                <h4 class="font-bold text-gray-700 mb-2">📄 Mô tả</h4>
                <p class="text-gray-600 leading-relaxed">
                    {{ $product->description }}
                </p>
            </div>

        </div>

    </div>

</div>

</x-layout-admin>
