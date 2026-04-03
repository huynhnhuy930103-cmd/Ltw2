<x-layout-admin>

    <h2 class="text-2xl font-bold mb-4">Sửa Topic</h2>

    <a href="{{ route('topic.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">
        ← Quay lại
    </a>

    <form action="{{ route('topic.update', $topic->id) }}" method="POST" class="mt-4 space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label>Tên Topic</label>
            <input type="text" name="name" value="{{ $topic->name }}" class="border w-full p-2 rounded">
        </div>

        <div>
            <label>Sắp xếp</label>
            <input type="number" name="sort_order" value="{{ $topic->sort_order }}" class="border w-full p-2 rounded">
        </div>

        <div>
            <label>Mô tả</label>
            <textarea name="description" class="border w-full p-2 rounded">
                {{ $topic->description }}
            </textarea>
        </div>

        <div>
            <label>Trạng thái</label>
            <select name="status" class="border w-full p-2 rounded">
                <option value="1" {{ $topic->status == 1 ? 'selected' : '' }}>Hiển thị</option>
                <option value="2" {{ $topic->status == 2 ? 'selected' : '' }}>Ẩn</option>
            </select>
        </div>

        <button class="bg-green-600 text-white px-4 py-2 rounded">
            Cập nhật
        </button>

    </form>

</x-layout-admin>
