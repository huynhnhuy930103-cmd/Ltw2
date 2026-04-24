<x-layout-admin>

<div class="min-h-screen bg-gradient-to-br from-slate-100 via-blue-50 to-indigo-100 p-6">

    <div class="max-w-5xl mx-auto">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-gray-800">
                🧩 Chi tiết Topic {{ $topic->id }}
            </h2>

            <div class="flex gap-2">
                <a href="{{ route('topic.index') }}"
                   class="px-4 py-2 rounded-lg bg-gray-400 text-white hover:bg-gray-500">
                    ← Quay lại
                </a>

                <a href="{{ route('topic.edit', $topic->id) }}"
                   class="px-4 py-2 rounded-lg bg-yellow-500 text-white hover:bg-yellow-600">
                    ✏ Sửa
                </a>
            </div>
        </div>

        <!-- MAIN CARD -->
        <div class="bg-white/80 backdrop-blur p-6 rounded-2xl shadow border space-y-4">

            <!-- NAME -->
            <h3 class="text-2xl font-bold text-gray-800">
                {{ $topic->name }}
            </h3>

            <p class="text-sm text-gray-500">
                {{ $topic->slug }}
            </p>

            <!-- INFO -->
            <div class="grid grid-cols-2 gap-4 mt-4 text-sm">

                <div class="p-3 bg-blue-50 rounded-lg">
                    <b>ID:</b> {{ $topic->id }}
                </div>

                <div class="p-3 bg-indigo-50 rounded-lg">
                    <b>Sắp xếp:</b> {{ $topic->sort_order }}
                </div>

            </div>

            <!-- STATUS -->
            <div class="mt-4">
                <span class="px-3 py-1 rounded-full text-sm font-semibold
                    {{ $topic->status == 1 ? 'bg-green-100 text-green-600' : 'bg-gray-200 text-gray-600' }}">
                    {{ $topic->status == 1 ? '✔ Hiển thị' : '⛔ Ẩn' }}
                </span>
            </div>

        </div>

        <!-- DESCRIPTION -->
        <div class="mt-6 bg-white/80 backdrop-blur p-6 rounded-2xl shadow border">
            <h4 class="font-bold text-gray-700 mb-2">📝 Mô tả</h4>

            <p class="text-gray-600 leading-relaxed">
                {{ $topic->description }}
            </p>
        </div>

    </div>

</div>

</x-layout-admin>
