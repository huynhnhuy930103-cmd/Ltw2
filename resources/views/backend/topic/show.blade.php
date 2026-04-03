<x-layout-admin>

    <h2 class="text-2xl font-bold mb-4">Chi tiết Topic</h2>

    <a href="{{ route('topic.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">
        ← Quay lại
    </a>

    <div class="mt-4 border p-4 rounded">

        <p><b>ID:</b> {{ $topic->id }}</p>
        <p><b>Tên:</b> {{ $topic->name }}</p>
        <p><b>Slug:</b> {{ $topic->slug }}</p>
        <p><b>Sắp xếp:</b> {{ $topic->sort_order }}</p>
        <p><b>Mô tả:</b> {{ $topic->description }}</p>

        <p>
            <b>Trạng thái:</b>
            {{ $topic->status == 1 ? 'Hiển thị' : 'Ẩn' }}
        </p>

    </div>

</x-layout-admin>
