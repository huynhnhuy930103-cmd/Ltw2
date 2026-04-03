<x-layout-admin>

    <h2 class="text-2xl font-bold mb-4">✏ Sửa bài viết</h2>

    <form action="{{ route('post.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Tiêu đề</label>
        <input type="text" name="title" value="{{ $post->title }}" class="border w-full p-2 mb-2">

        <label>Slug</label>
        <input type="text" name="slug" value="{{ $post->slug }}" class="border w-full p-2 mb-2">

        <label>Mô tả</label>
        <textarea name="description" class="border w-full p-2 mb-2">{{ $post->description }}</textarea>

        <label>Chi tiết</label>
        <textarea name="detail" class="border w-full p-2 mb-2">{{ $post->detail }}</textarea>

        <label>Loại bài viết</label>
        <select name="post_type" class="border w-full p-2 mb-2">
            <option value="post" {{ $post->post_type == 'post' ? 'selected' : '' }}>Post</option>
            <option value="page" {{ $post->post_type == 'page' ? 'selected' : '' }}>Page</option>
        </select>

        <button class="bg-green-500 text-white px-4 py-2 rounded">
            Cập nhật
        </button>

        <a href="{{ route('post.index') }}" class="ml-2 text-gray-600">
            Quay lại
        </a>
    </form>

</x-layout-admin>
