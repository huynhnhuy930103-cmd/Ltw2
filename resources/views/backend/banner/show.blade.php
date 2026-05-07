<x-layout-admin>

<div class="min-h-screen bg-gradient-to-br from-slate-100 via-blue-50 to-indigo-100 p-6">

    <div class="max-w-6xl mx-auto">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-gray-800">
                🖼 Chi tiết banner #{{ $banner->id }}
            </h2>

            <div class="flex gap-2">
                <a href="{{ route('banner.index') }}"
                   class="px-4 py-2 rounded-lg bg-gray-400 text-white hover:bg-gray-500">
                    ← Quay lại
                </a>

                <a href="{{ route('banner.edit', $banner->id) }}"
                   class="px-4 py-2 rounded-lg bg-yellow-500 text-white hover:bg-yellow-600">
                    ✏ Sửa
                </a>
            </div>
        </div>

        <!-- MAIN -->
        <div class="grid grid-cols-3 gap-6">

            <!-- IMAGE -->
            <div class="col-span-1 bg-white/80 backdrop-blur p-4 rounded-2xl shadow border">
                @if ($banner->image)
                    <img src="{{ asset('storage/' . $banner->image) }}"
                         class="w-full h-60 object-cover rounded-xl shadow">
                @else
                    <div class="w-full h-60 flex items-center justify-center bg-gray-100 rounded-xl text-gray-400">
                        No Image
                    </div>
                @endif
            </div>

            <!-- INFO -->
            <div class="col-span-2 bg-white/80 backdrop-blur p-6 rounded-2xl shadow border space-y-4">

                <!-- NAME -->
                <h3 class="text-2xl font-bold text-gray-800">
                    {{ $banner->name }}
                </h3>

                <!-- LINK -->
                <p class="text-blue-600 underline">
                    <a href="{{ $banner->link }}" target="_blank">
                        {{ $banner->link }}
                    </a>
                </p>

                <!-- POSITION -->
                <div class="flex gap-4 text-sm mt-2">

                    <span class="px-3 py-1 rounded-full text-xs
                        {{ $banner->position == 'slideshow'
                            ? 'bg-blue-100 text-blue-600'
                            : 'bg-yellow-100 text-yellow-600' }}">
                        {{ $banner->position }}
                    </span>

                    <!-- STATUS -->
                    <span class="px-3 py-1 rounded-full text-xs text-white
                        {{ $banner->status ? 'bg-green-500' : 'bg-gray-400' }}">
                        {{ $banner->status ? '✔ Hiển thị' : '⛔ Ẩn' }}
                    </span>

                </div>

                <!-- SORT -->
                <div class="mt-4">
                    <p class="text-gray-500 text-sm">Thứ tự</p>
                    <p class="text-lg font-semibold text-gray-700">
                        {{ $banner->sort_order }}
                    </p>
                </div>

                <!-- DATE -->
                <div class="text-sm text-gray-500 mt-4">
                    Ngày tạo: {{ $banner->created_at }}
                </div>

            </div>

        </div>

        <!-- DESCRIPTION -->
        <div class="mt-6 bg-white/80 backdrop-blur p-6 rounded-2xl shadow border">

            <h4 class="font-bold text-gray-700 mb-2">📄 Mô tả</h4>

            <p class="text-gray-600 leading-relaxed">
                {{ $banner->description }}
            </p>

        </div>

    </div>

</div>

</x-layout-admin>
