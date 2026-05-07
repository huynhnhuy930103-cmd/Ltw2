<x-layout-admin>

<div class="min-h-screen bg-gradient-to-br from-slate-100 via-blue-50 to-indigo-100 p-6">

    <div class="max-w-6xl mx-auto bg-white/80 backdrop-blur-md p-8 rounded-2xl shadow-xl border border-gray-200">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-gray-800">
                ✏️ Cập nhật banner #{{ $banner->id }}
            </h2>

            <a href="{{ route('banner.index') }}"
               class="px-5 py-2 rounded-lg bg-gray-400 text-white hover:bg-gray-500">
                ← Quay lại
            </a>
        </div>

        <form action="{{ route('banner.update', $banner->id) }}"
              method="POST"
              enctype="multipart/form-data"
              class="grid grid-cols-2 gap-6">

            @csrf
            @method('PUT')

            <!-- NAME -->
            <div>
                <label class="text-sm text-gray-600">Tên banner</label>
                <input type="text" name="name"
                    value="{{ $banner->name }}"
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400 outline-none">
            </div>

            <!-- LINK -->
            <div>
                <label class="text-sm text-gray-600">Link</label>
                <input type="text" name="link"
                    value="{{ $banner->link }}"
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400 outline-none">
            </div>

            <!-- POSITION -->
            <div>
                <label class="text-sm text-gray-600">Vị trí</label>
                <select name="position"
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400">
                    <option value="slideshow" {{ $banner->position == 'slideshow' ? 'selected' : '' }}>
                        Slideshow
                    </option>
                    <option value="advertise" {{ $banner->position == 'advertise' ? 'selected' : '' }}>
                        Advertise
                    </option>
                </select>
            </div>

            <!-- SORT ORDER -->
            <div>
                <label class="text-sm text-gray-600">Thứ tự</label>
                <input type="number" name="sort_order"
                    value="{{ $banner->sort_order }}"
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400 outline-none">
            </div>

            <!-- STATUS -->
            <div>
                <label class="text-sm text-gray-600">Trạng thái</label>
                <select name="status"
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400">
                    <option value="1" {{ $banner->status == 1 ? 'selected' : '' }}>✔ Hiển thị</option>
                    <option value="0" {{ $banner->status == 0 ? 'selected' : '' }}>⛔ Ẩn</option>
                </select>
            </div>

            <!-- IMAGE -->
            <div class="col-span-2">
                <label class="text-sm text-gray-600">Hình ảnh</label>

                <div class="flex items-center gap-4 mt-2">

                    @if($banner->image)
                        <img src="{{ asset('storage/' . $banner->image) }}"
                             id="preview"
                             class="h-24 w-40 object-cover rounded-xl shadow border">
                    @else
                        <div id="preview"
                             class="h-24 w-40 flex items-center justify-center bg-gray-100 rounded-xl text-gray-400">
                            No image
                        </div>
                    @endif

                    <input type="file"
                           name="image"
                           class="flex-1 border px-4 py-2 rounded-lg">
                </div>
            </div>

            <!-- DESCRIPTION -->
            <div class="col-span-2">
                <label class="text-sm text-gray-600">Mô tả</label>
                <textarea name="description" rows="3"
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400">{{ $banner->description }}</textarea>
            </div>

            <!-- BUTTON -->
            <div class="col-span-2 flex justify-end gap-3 mt-4">

                <a href="{{ route('banner.index') }}"
                   class="px-5 py-2 rounded-lg bg-gray-400 text-white hover:bg-gray-500">
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

{{-- PREVIEW IMAGE --}}
<script>
document.querySelector('input[type="file"]').onchange = e => {
    const [file] = e.target.files;
    if (file) {
        document.getElementById('preview').src = URL.createObjectURL(file);
    }
}
</script>

</x-layout-admin>
