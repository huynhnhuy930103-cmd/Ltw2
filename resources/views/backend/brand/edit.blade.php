<x-layout-admin>

<div class="min-h-screen bg-gradient-to-br from-slate-100 via-blue-50 to-indigo-100 p-6">

    <div class="max-w-6xl mx-auto bg-white/80 backdrop-blur-md p-8 rounded-2xl shadow-xl border border-gray-200">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-gray-800">
                ✏️ Cập nhật thương hiệu #{{ $brand->id }}
            </h2>

            <a href="{{ route('brand.index') }}"
               class="px-5 py-2 rounded-lg bg-gray-400 text-white hover:bg-gray-500 transition">
                ← Quay lại
            </a>
        </div>

        <form action="{{ route('brand.update', $brand->id) }}"
              method="POST"
              enctype="multipart/form-data"
              class="grid grid-cols-2 gap-6">

            @csrf
            @method('PUT')

            <!-- NAME -->
            <div>
                <label class="text-sm text-gray-600">Tên thương hiệu</label>
                <input type="text" name="name" id="name"
                    value="{{ $brand->name }}"
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400 outline-none">
            </div>

            <!-- SLUG -->
            <div>
                <label class="text-sm text-gray-600">Slug</label>
                <input type="text" name="slug" id="slug"
                    value="{{ $brand->slug }}"
                    readonly
                    class="w-full border px-4 py-2 rounded-lg bg-gray-100">
            </div>

            <!-- SORT -->
            <div>
                <label class="text-sm text-gray-600">Thứ tự</label>
                <input type="number" name="sort_order"
                    value="{{ $brand->sort_order }}"
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400">
            </div>

            <!-- STATUS -->
            <div>
                <label class="text-sm text-gray-600">Trạng thái</label>
                <select name="status"
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400">

                    <option value="1" {{ $brand->status == 1 ? 'selected' : '' }}>
                        ✔ Hiển thị
                    </option>

                    <option value="2" {{ $brand->status == 2 ? 'selected' : '' }}>
                        ⛔ Ẩn
                    </option>

                </select>
            </div>

            <!-- IMAGE -->
            <div class="col-span-2">
                <label class="text-sm text-gray-600">Hình ảnh</label>

                <div class="flex items-center gap-4 mt-2">

                    @if ($brand->image)
                        <img src="{{ asset('storage/' . $brand->image) }}"
                             id="preview"
                             class="h-24 w-24 object-cover rounded-xl shadow border">
                    @else
                        <div id="preview"
                             class="h-24 w-24 flex items-center justify-center bg-gray-100 rounded-xl text-gray-400">
                            No img
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
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400">
                    {{ $brand->description }}
                </textarea>
            </div>

            <!-- BUTTON -->
            <div class="col-span-2 flex justify-end gap-3 mt-4">

                <a href="{{ route('brand.index') }}"
                   class="px-5 py-2 rounded-lg bg-gray-400 text-white hover:bg-gray-500 transition">
                    Hủy
                </a>

                <button
                    class="px-6 py-2 rounded-lg text-white bg-gradient-to-r from-yellow-500 to-orange-500 hover:scale-105 transition shadow-lg">
                    💾 Cập nhật
                </button>

            </div>

        </form>

    </div>

</div>

{{-- AUTO SLUG --}}
<script>
document.getElementById('name').addEventListener('input', function () {
    let slug = this.value
        .toLowerCase()
        .normalize('NFD')
        .replace(/[\u0300-\u036f]/g, '')
        .replace(/đ/g, 'd')
        .replace(/[^a-z0-9 ]/g, '')
        .replace(/\s+/g, '-')
        .replace(/-+/g, '-');

    document.getElementById('slug').value = slug;
});
</script>

{{-- IMAGE PREVIEW --}}
<script>
document.querySelector('input[type="file"]').onchange = e => {
    const [file] = e.target.files;
    if (file) {
        document.getElementById('preview').src = URL.createObjectURL(file);
    }
}
</script>

</x-layout-admin>
