<x-layout-admin>

    <h2 class="text-2xl font-bold mb-4">Thêm Menu</h2>

    <form action="{{ route('menu.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label>Tên menu</label>
            <input type="text" name="name" class="w-full border p-2 rounded">
        </div>

        <div>
            <label>Link</label>
            <input type="text" name="link" class="w-full border p-2 rounded">
        </div>

        <div>
            <label>Vị trí</label>
            <select name="position" class="w-full border p-2 rounded">
                <option value="mainmenu">Main Menu</option>
                <option value="footermenu">Footer Menu</option>
            </select>
        </div>

        <div>
            <label>Type</label>
            <select name="type" class="w-full border p-2 rounded">
                <option value="custom">Custom</option>
                <option value="category">Category</option>
                <option value="brand">Brand</option>
                <option value="topic">Topic</option>
                <option value="page">Page</option>
            </select>
        </div>

        <div>
            <label>Sort Order</label>
            <input type="number" name="sort_order" value="1" class="w-full border p-2 rounded">
        </div>

        <div>
            <label>Trạng thái</label>
            <select name="status" class="w-full border p-2 rounded">
                <option value="1">Hiển thị</option>
                <option value="0">Ẩn</option>
            </select>
        </div>

        <button class="bg-green-600 text-white px-4 py-2 rounded">
            Lưu
        </button>
    </form>

</x-layout-admin>
