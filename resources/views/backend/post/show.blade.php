<x-layout-admin>

<div class="min-h-screen bg-gradient-to-br from-slate-100 via-blue-50 to-indigo-100 p-6">

    <div class="max-w-5xl mx-auto">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-gray-800">
                📝 Chi tiết bài viết #{{ $post->id }}
            </h2>

            <a href="{{ route('post.index') }}"
               class="px-4 py-2 rounded-lg bg-gray-400 text-white hover:bg-gray-500 transition">
                ⬅ Quay lại
            </a>
        </div>

        <!-- CARD -->
        <div class="bg-white/80 backdrop-blur-md p-6 rounded-2xl shadow-xl border border-gray-200 space-y-5">

            <!-- TITLE -->
            <div>
                <p class="text-gray-500 text-sm">Tiêu đề</p>
                <h3 class="text-2xl font-bold text-gray-800">
                    {{ $post->title }}
                </h3>
            </div>

            <!-- META -->
            <div class="grid grid-cols-2 gap-4 text-sm">

                <div>
                    <p class="text-gray-500">Slug</p>
                    <p class="font-semibold text-gray-700">
                        {{ $post->slug }}
                    </p>
                </div>

                <div>
                    <p class="text-gray-500">Loại bài viết</p>
                    <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-600">
                        {{ $post->post_type }}
                    </span>
                </div>

            </div>

            <!-- DESCRIPTION -->
            <div>
                <p class="text-gray-500 text-sm mb-1">Mô tả</p>
                <div class="bg-gray-50 border rounded-xl p-4 text-gray-700">
                    {{ $post->description }}
                </div>
            </div>

            <!-- DETAIL -->
            <div>
                <p class="text-gray-500 text-sm mb-1">Chi tiết</p>
                <div class="bg-white border rounded-xl p-4 text-gray-700 leading-relaxed prose max-w-none">
                    {!! $post->detail !!}
                </div>
            </div>

        </div>

        <!-- ACTION -->
        <div class="mt-6 flex gap-3">

            <a href="{{ route('post.edit', $post->id) }}"
               class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition">
                ✏ Sửa
            </a>

            <form action="{{ route('post.destroy', $post->id) }}"
                  method="POST"
                  onsubmit="return confirm('Xóa bài viết này?')">

                @csrf
                @method('DELETE')

                <button class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition">
                    🗑 Xóa
                </button>

            </form>

        </div>

    </div>

</div>

</x-layout-admin>
