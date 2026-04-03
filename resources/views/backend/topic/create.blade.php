<x-layout-admin>

    <h2 class="text-2xl font-bold mb-4">Thêm Topic</h2>

    <a href="{{ route('topic.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">
        ← Quay lại
    </a>

    <form action="{{ route('topic.store') }}" method="POST" class="mt-4 space-y-4">
        @csrf

        <div>
            <label>Tên Topic</label>
            <input type="text" name="name" class="border w-full p-2 rounded">
        </div>

        <div>
            <label>Sắp xếp</label>
            <input type="number" name="sort_order" value="1" class="border w-full p-2 rounded">
        </div>

        <div>
            <label>Mô tả</label>
            <textarea name="description" class="border w-full p-2 rounded"></textarea>
        </div>

        <div>
            <label>Trạng thái</label>
            <select name="status" class="border w-full p-2 rounded">
                <option value="1">Hiển thị</option>
                <option value="2">Ẩn</option>
            </select>
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">
            Thêm mới
        </button>

    </form>

</x-layout-admin>
