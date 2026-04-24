<x-layout-admin>

<div class="min-h-screen bg-gradient-to-br from-slate-100 via-blue-50 to-indigo-100 p-6">

    <div class="max-w-4xl mx-auto bg-white/80 backdrop-blur-md p-8 rounded-2xl shadow-xl border border-gray-200">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-gray-800">
                ➕ Thêm bài viết
            </h2>

            <a href="{{ route('post.index') }}"
               class="px-5 py-2 rounded-lg bg-gray-400 text-white hover:bg-gray-500">
                ← Quay lại
            </a>
        </div>

        <!-- FORM -->
        <form action="{{ route('post.store') }}" method="POST"
              class="grid grid-cols-2 gap-6">

            @csrf

            <!-- TITLE -->
            <div class="col-span-2">
                <label class="text-sm text-gray-600">Tiêu đề</label>
                <input type="text" name="title"
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400 outline-none"
                    placeholder="Nhập tiêu đề...">
            </div>

            <!-- SLUG -->
            <div class="col-span-2">
                <label class="text-sm text-gray-600">Slug</label>
                <input type="text" name="slug"
                    class="w-full border px-4 py-2 rounded-lg bg-gray-100">
            </div>

            <!-- DESCRIPTION -->
            <div class="col-span-2">
                <label class="text-sm text-gray-600">Mô tả</label>
                <textarea name="description" rows="3"
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400"
                    placeholder="Nhập mô tả..."></textarea>
            </div>

            <!-- DETAIL -->
            <div class="col-span-2">
                <label class="text-sm text-gray-600">Chi tiết</label>
                <textarea name="detail" rows="5"
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400"
                    placeholder="Nhập nội dung chi tiết..."></textarea>
            </div>

            <!-- TYPE -->
            <div class="col-span-2">
                <label class="text-sm text-gray-600">Loại bài viết</label>
                <select name="post_type"
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400">

                    <option value="post">Post</option>
                    <option value="page">Page</option>

                </select>
            </div>

            <!-- BUTTON -->
            <div class="col-span-2 flex justify-end gap-3 mt-4">

                <a href="{{ route('post.index') }}"
                   class="px-5 py-2 rounded-lg bg-gray-400 text-white hover:bg-gray-500">
                    Hủy
                </a>

                <button
                    class="px-6 py-2 rounded-lg text-white bg-gradient-to-r from-blue-500 to-indigo-500 hover:scale-105 transition shadow-lg">
                    💾 Lưu bài viết
                </button>

            </div>

        </form>

    </div>

</div>

</x-layout-admin>
