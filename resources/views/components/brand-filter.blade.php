<div class="mb-6">
    <h3 class="font-semibold mb-2">
        Thương hiệu
    </h3>
    <ul class="space-y-2 text-gray-600">
        {{-- Vòng lặp lấy danh sách thương hiệu từ biến $brands --}}
        @foreach($list_brand as $brand)
        <li>
            <a href="{{ route('site.product.index', ['brand' => $brand->id]) }}">
                {{ $brand->name }}
            </a>
        </li>
        @endforeach
    </ul>
</div>
