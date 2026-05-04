<x-layout-site>
    <form action="" method="get">
        <div class="container mx-auto px-4 py-6">

            <!-- BREADCRUMB -->
            <div class="text-sm text-gray-500 mb-6">
                <a href="#" class="hover:text-blue-600">Trang chủ</a>
                <i class="fa fa-angle-right mx-2"></i>
                <span>Sản phẩm</span>
            </div>

            <h1 class="text-3xl font-bold mb-6">Sản phẩm</h1>

            <!-- GRID CHA -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

                <!-- SIDEBAR -->
                <div class="bg-white p-6 rounded shadow">

                    <h2 class="font-bold text-lg mb-4">
                        <i class="fa fa-filter"></i> Bộ lọc
                    </h2>

                    <!-- CATEGORY -->
                    <x-category-filter />

                    <!-- PRICE -->
                    <div class="mb-6">
                        <h3 class="font-semibold mb-2">Khoảng giá</h3>
                        <ul class="space-y-2 text-gray-600">
                            <li>
                                <label>
                                    <input type="radio" name="price" value="all"
                                        {{ request('price') == 'all' ? 'checked' : '' }}>
                                    Tất cả
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="radio" name="price" value="0-200000"
                                        {{ request('price') == '0-200000' ? 'checked' : '' }}>
                                    0 - 200.000đ
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="radio" name="price" value="200000-500000"
                                        {{ request('price') == '200000-500000' ? 'checked' : '' }}>
                                    200.000 - 500.000đ
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="radio" name="price" value="500000-9999999999"
                                        {{ request('price') == '500000-9999999999' ? 'checked' : '' }}>
                                    500.000đ+
                                </label>
                            </li>
                        </ul>

                        <button type="submit"
                            class="bg-blue-500 text-white w-full px-3 py-2 rounded mt-3 hover:bg-blue-600">
                            Áp dụng
                        </button>
                    </div>

                    <!-- BRAND -->
                    <x-brand-filter />

                </div>

                <!-- PRODUCT -->
                <div class="md:col-span-3">

                    <!-- TOOLBAR -->
                    <div class="flex flex-wrap justify-between items-center gap-4 mb-6 bg-white p-4 rounded shadow">

                        <!-- SEARCH -->
                        <div class="flex items-center gap-2">
                            <input type="text" name="keyword"
                                class="border px-4 py-2 rounded w-[220px] focus:outline-none focus:ring-2 focus:ring-blue-400"
                                placeholder="Tìm kiếm..."
                                value="{{ request('keyword') }}">

                            <button type="submit"
                                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>

                        <!-- SORT -->
                        <div class="flex items-center gap-4">
                            <select name="sort" class="border px-3 py-2 rounded">
                                <option value="">Sắp xếp</option>
                                <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>
                                    Giá tăng
                                </option>
                                <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>
                                    Giá giảm
                                </option>
                                <option value="new" {{ request('sort') == 'new' ? 'selected' : '' }}>
                                    Mới nhất
                                </option>
                            </select>

                            <div class="flex gap-3 text-gray-600">
                                <i class="fa fa-grid text-lg cursor-pointer"></i>
                                <i class="fa fa-list text-lg cursor-pointer"></i>
                            </div>
                        </div>

                    </div>

                    <!-- PRODUCT GRID -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                        @foreach($list_product as $product)
                        <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition overflow-hidden group">

                            <!-- IMAGE -->
                            <div class="relative overflow-hidden">
                                <img src="{{ $product->image
            ? asset('storage/' . $product->image)
            : 'https://picsum.photos/300/250' }}"
                                    class="w-full h-56 object-contain bg-gray-100 p-3 transition duration-300 group-hover:scale-110">


                            </div>

                            <!-- CONTENT -->
                            <div class="p-4">

                                <h3 class="font-semibold text-gray-800 mb-2 line-clamp-2 h-12">
                                    {{ $product->name }}
                                </h3>

                                <p class="text-red-500 font-bold text-lg mb-3">
                                    {{ number_format($product->price_buy) }}đ
                                </p>

                                <!-- ACTION -->
                                <div class="flex justify-between items-center">

                                    <a href="/them-gio/{{ $product->id }}"
                                        class="bg-blue-500 text-white px-3 py-2 rounded-lg hover:bg-blue-600">
                                        <i class="fa fa-cart-plus"></i>
                                    </a>

                                    <div class="flex gap-2">
                                        <button class="border px-3 py-2 rounded hover:bg-gray-100">
                                            <i class="fa fa-heart"></i>
                                        </button>

                                        <a href="{{ route('site.product.detail', $product->slug) }}"
                                            class="border px-3 py-2 rounded hover:bg-gray-100">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </div>

                                </div>

                            </div>
                        </div>
                        @endforeach

                    </div>

                    <!-- PAGINATION -->
                    <div class="flex justify-center mt-10">
                        {{ $list_product->links() }}
                    </div>

                </div>

            </div>

        </div>
    </form>
</x-layout-site>
