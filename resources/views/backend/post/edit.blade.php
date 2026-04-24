<x-layout-admin>

<div class="min-h-screen bg-gradient-to-br from-slate-100 via-blue-50 to-indigo-100 p-6">

    <div class="max-w-5xl mx-auto bg-white/80 backdrop-blur-md p-8 rounded-2xl shadow-xl border border-gray-200">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-gray-800">
                ✏️ Sửa bài viết #{{ $post->id }}
            </h2>

            <a href="{{ route('post.index') }}"
               class="px-5 py-2 rounded-lg bg-gray-400 text-white hover:bg-gray-500 transition">
                ← Quay lại
            </a>
        </div>

        <!-- FORM -->
        <form action="{{ route('post.update', $post->id) }}"
              method="POST"
              class="grid grid-cols-2 gap-6">

            @csrf
            @method('PUT')

            <!-- TITLE -->
            <div class="col-span-2">
                <label class="text-sm text-gray-600">Tiêu đề</label>
                <input type="text"
                       name="title"
                       value="{{ $post->title }}"
                       class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400 outline-none">
            </div>

            <!-- SLUG -->
            <div class="col-span-2">
                <label class="text-sm text-gray-600">Slug</label>
                <input type="text"
                       name="slug"
                       value="{{ $post->slug }}"
                       class="w-full border px-4 py-2 rounded-lg bg-gray-100"
                       readonly>
            </div>

            <!-- TYPE -->
            <div>
                <label class="text-sm text-gray-600">Loại bài viết</label>
                <select name="post_type"
                        class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400">

                    <option value="post" {{ $post->post_type == 'post' ? 'selected' : '' }}>
                        Post
                    </option>

                    <option value="page" {{ $post->post_type == 'page' ? 'selected' : '' }}>
                        Page
                    </option>

                </select>
            </div>

            <!-- STATUS (optional nếu có) -->
            <div>
                <label class="text-sm text-gray-600">Trạng thái</label>
                <select name="status"
                        class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400">

                    <option value="1" {{ $post->status == 1 ? 'selected' : '' }}>Hiển thị</option>
                    <option value="0" {{ $post->status == 0 ? 'selected' : '' }}>Ẩn</option>

                </select>
            </div>

            <!-- DESCRIPTION -->
            <div class="col-span-2">
                <label class="text-sm text-gray-600">Mô tả</label>
                <textarea name="description"
                          rows="3"
                          class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400">{{ $post->description }}</textarea>
            </div>

            <!-- DETAIL -->
            <div class="col-span-2">
                <label class="text-sm text-gray-600">Chi tiết</label>
                <textarea name="detail"
                          rows="5"
                          class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400">{{ $post->detail }}</textarea>
            </div>

            <!-- BUTTON -->
            <div class="col-span-2 flex justify-end gap-3 mt-4">

                <a href="{{ route('post.index') }}"
                   class="px-5 py-2 rounded-lg bg-gray-400 text-white hover:bg-gray-500 transition">
                    Hủy
                </a>

                <button
                    class="px-6 py-2 rounded-lg text-white bg-gradient-to-r from-green-500 to-emerald-500 hover:scale-105 transition shadow-lg">
                    💾 Cập nhật
                </button>

            </div>

        </form>

    </div>

</div>

</x-layout-admin>
