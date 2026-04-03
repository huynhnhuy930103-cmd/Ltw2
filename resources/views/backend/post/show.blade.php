<x-layout-admin>

    <h2 class="text-2xl font-bold mb-4">Chi tiết bài viết</h2>

    <a href="{{ route('post.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">
        ⬅ Quay lại
    </a>

    <div class="mt-4 border p-4">
        <p><b>Tiêu đề:</b> {{ $post->title }}</p>
        <p><b>Slug:</b> {{ $post->slug }}</p>
        <p><b>Mô tả:</b> {{ $post->description }}</p>
        <p><b>Chi tiết:</b> {!! $post->detail !!}</p>
        <p><b>Loại:</b> {{ $post->post_type }}</p>
    </div>

</x-layout-admin>
