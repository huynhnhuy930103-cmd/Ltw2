<div class="bg-white rounded-2xl shadow p-6">

    <h2 class="text-2xl font-bold mb-6 text-gray-800">
        🧩 Danh mục sản phẩm
    </h2>

    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6">

        @if(isset($categories) && $categories->count() > 0)
        @foreach($categories as $cat)
        <a href="{{ route('site.product.index', ['category' => $cat->slug]) }}"
           class="flex flex-col items-center p-4 rounded-xl hover:bg-gray-100 transition group">

            <!-- IMAGE -->
            <div class="w-20 h-20 mb-3 flex items-center justify-center bg-gray-100 rounded-full overflow-hidden">
                <img src="{{ $cat->image
                    ? asset('storage/' . $cat->image)
                    : 'https://picsum.photos/100' }}"
                    class="w-full h-full object-contain group-hover:scale-110 transition">
            </div>

            <!-- NAME -->
            <p class="text-sm font-semibold text-gray-700 text-center group-hover:text-blue-500">
                {{ $cat->name }}
            </p>

        </a>
        @endforeach
        @else
        <p class="text-gray-500">Không có danh mục nào.</p>
        @endif

    </div>

</div>
