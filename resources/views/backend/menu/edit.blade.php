<x-layout-admin>

    <h2 class="text-2xl font-bold mb-4">Sửa Menu</h2>

    <form action="{{ route('menu.update', $menu->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label>Tên menu</label>
            <input type="text" name="name" value="{{ $menu->name }}" class="w-full border p-2 rounded">
        </div>

        <div>
            <label>Link</label>
            <input type="text" name="link" value="{{ $menu->link }}" class="w-full border p-2 rounded">
        </div>

        <div>
            <label>Vị trí</label>
            <select name="position" class="w-full border p-2 rounded">
                <option value="mainmenu" {{ $menu->position == 'mainmenu' ? 'selected' : '' }}>Main Menu</option>
                <option value="footermenu" {{ $menu->position == 'footermenu' ? 'selected' : '' }}>Footer Menu</option>
            </select>
        </div>

        <div>
            <label>Type</label>
            <select name="type" class="w-full border p-2 rounded">
                <option value="custom" {{ $menu->type == 'custom' ? 'selected' : '' }}>Custom</option>
                <option value="category" {{ $menu->type == 'category' ? 'selected' : '' }}>Category</option>
                <option value="brand" {{ $menu->type == 'brand' ? 'selected' : '' }}>Brand</option>
                <option value="topic" {{ $menu->type == 'topic' ? 'selected' : '' }}>Topic</option>
                <option value="page" {{ $menu->type == 'page' ? 'selected' : '' }}>Page</option>
            </select>
        </div>

        <div>
            <label>Sort Order</label>
            <input type="number" name="sort_order" value="{{ $menu->sort_order }}" class="w-full border p-2 rounded">
        </div>

        <div>
            <label>Trạng thái</label>
            <select name="status" class="w-full border p-2 rounded">
                <option value="1" {{ $menu->status == 1 ? 'selected' : '' }}>Hiển thị</option>
                <option value="0" {{ $menu->status == 0 ? 'selected' : '' }}>Ẩn</option>
            </select>
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">
            Cập nhật
        </button>
    </form>

</x-layout-admin>
