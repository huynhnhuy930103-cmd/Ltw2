<x-layout-admin>

<div class="min-h-screen bg-gradient-to-br from-indigo-100 via-blue-50 to-purple-100 p-6">

    <div class="max-w-5xl mx-auto bg-white/80 backdrop-blur-md p-8 rounded-2xl shadow-xl border">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-gray-800">
                ➕ Thêm banner mới
            </h2>

            <a href="{{ route('banner.index') }}"
               class="px-5 py-2 rounded-lg bg-gray-400 text-white hover:bg-gray-500">
                ← Quay lại
            </a>
        </div>

        <form action="{{ route('banner.store') }}"
              method="POST"
              enctype="multipart/form-data"
              class="grid grid-cols-2 gap-6">

            @csrf

            <!-- NAME -->
            <div>
                <label class="text-sm text-gray-600">Tên banner</label>
                <input type="text" name="name" id="name"
                    value="{{ old('name') }}"
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400 outline-none"
                    placeholder="Nhập tên banner...">

                @if ($errors->has('name'))
                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('name') }}</p>
                @endif
            </div>

            <!-- LINK -->
            <div>
                <label class="text-sm text-gray-600">Link</label>
                <input type="text" name="link"
                    value="{{ old('link') }}"
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400 outline-none"
                    placeholder="https://...">

                @if ($errors->has('link'))
                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('link') }}</p>
                @endif
            </div>

            <!-- SORT ORDER -->
            <div>
                <label class="text-sm text-gray-600">Thứ tự</label>
                <input type="number" name="sort_order"
                    value="{{ old('sort_order', 1) }}"
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400 outline-none">

                @if ($errors->has('sort_order'))
                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('sort_order') }}</p>
                @endif
            </div>

            <!-- POSITION -->
            <div>
                <label class="text-sm text-gray-600">Vị trí</label>
                <select name="position"
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400">

                    <option value="slideshow" {{ old('position')=='slideshow'?'selected':'' }}>Slideshow</option>
                    <option value="advertise" {{ old('position')=='advertise'?'selected':'' }}>Advertise</option>

                </select>

                @if ($errors->has('position'))
                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('position') }}</p>
                @endif
            </div>

            <!-- STATUS -->
            <div>
                <label class="text-sm text-gray-600">Trạng thái</label>
                <select name="status"
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400">

                    <option value="1" {{ old('status')==1?'selected':'' }}>✔ Hiển thị</option>
                    <option value="0" {{ old('status')==0?'selected':'' }}>⛔ Ẩn</option>

                </select>
            </div>

            <!-- IMAGE -->
            <div class="col-span-2">
                <label class="text-sm text-gray-600">Hình ảnh</label>

                <div class="flex items-center gap-4 mt-2">

                    <div id="preview"
                         class="h-28 w-28 flex items-center justify-center bg-gray-100 rounded-xl border text-gray-400">
                        IMG
                    </div>

                    <input type="file" name="image"
                           class="flex-1 border px-4 py-2 rounded-lg">
                </div>

                @if ($errors->has('image'))
                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('image') }}</p>
                @endif
            </div>

            <!-- DESCRIPTION -->
            <div class="col-span-2">
                <label class="text-sm text-gray-600">Mô tả</label>
                <textarea name="description" rows="3"
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400"
                    placeholder="Nhập mô tả banner...">{{ old('description') }}</textarea>

                @if ($errors->has('description'))
                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('description') }}</p>
                @endif
            </div>

            <!-- BUTTON -->
            <div class="col-span-2 flex justify-end gap-3 mt-4">

                <a href="{{ route('banner.index') }}"
                   class="px-5 py-2 rounded-lg bg-gray-400 text-white hover:bg-gray-500">
                    Hủy
                </a>

                <button
                    class="px-6 py-2 rounded-lg text-white bg-gradient-to-r from-indigo-500 to-purple-500 hover:scale-105 transition shadow-lg">
                    💾 Lưu banner
                </button>

            </div>

        </form>

    </div>
</div>

<!-- PREVIEW IMAGE -->
<script>
document.querySelector('input[type="file"]').onchange = e => {
    const [file] = e.target.files;
    if (file) {
        const preview = document.getElementById('preview');
        preview.innerHTML = "";
        const img = document.createElement("img");
        img.src = URL.createObjectURL(file);
        img.className = "h-28 w-28 object-cover rounded-xl";
        preview.appendChild(img);
    }
}
</script>

</x-layout-admin>
