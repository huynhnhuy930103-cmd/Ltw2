<x-layout-admin>

    <h2 class="text-2xl font-bold mb-4">Chi tiết Menu</h2>

    <div class="border p-4 rounded space-y-2">
        <p><b>ID:</b> {{ $menu->id }}</p>
        <p><b>Tên:</b> {{ $menu->name }}</p>
        <p><b>Link:</b> {{ $menu->link }}</p>
        <p><b>Vị trí:</b> {{ $menu->position }}</p>
        <p><b>Type:</b> {{ $menu->type }}</p>
        <p><b>Sort:</b> {{ $menu->sort_order }}</p>
        <p><b>Status:</b> {{ $menu->status ? 'Hiển thị' : 'Ẩn' }}</p>
    </div>

</x-layout-admin>
