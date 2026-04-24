<div class="mb-6">
    <h3 class="font-semibold mb-2">Danh mục</h3>
    <ul class="space-y-2 text-gray-600">
        @foreach($list_category as $item)
        <li>
            <a href="{{ route('site.product.index', ['category' => $item->slug]) }}">
                {{ $item->name }}
            </a>
        </li>
        @endforeach
    </ul>
</div>
