<x-layout-admin>

    <h2 class="text-2xl font-bold mb-4">➕ Thêm bài viết</h2>

    <form action="{{ route('post.store') }}" method="POST">
        @csrf

        <label>Tiêu đề</label>
        <input type="text" name="title" class="border w-full p-2 mb-2">

        <label>Slug</label>
        <input type="text" name="slug" class="border w-full p-2 mb-2">

        <label>Mô tả</label>
        <textarea name="description" class="border w-full p-2 mb-2"></textarea>

        <label>Chi tiết</label>
        <textarea name="detail" class="border w-full p-2 mb-2"></textarea>

        <label>Loại bài viết</label>
        <select name="post_type" class="border w-full p-2 mb-2">
            <option value="post">Post</option>
            <option value="page">Page</option>
        </select>

        <button class="bg-blue-500 text-white px-4 py-2 rounded">
            Lưu
        </button>

        <a href="{{ route('post.index') }}" class="ml-2 text-gray-600">
            Quay lại
        </a>
    </form>

</x-layout-admin>
