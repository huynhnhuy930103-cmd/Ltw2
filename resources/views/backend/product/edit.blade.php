<x-layout-admin>

<div class="min-h-screen bg-gradient-to-br from-slate-100 via-blue-50 to-indigo-100 p-6">

    <div class="max-w-6xl mx-auto bg-white/80 backdrop-blur-md p-8 rounded-2xl shadow-xl border border-gray-200">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-gray-800">
                ✏️ Cập nhật sản phẩm {{ $product->id }}
            </h2>

            <a href="{{ route('product.index') }}"
               class="px-5 py-2 rounded-lg bg-gray-400 text-white hover:bg-gray-500">
                ← Quay lại
            </a>
        </div>

        <form action="{{ route('product.update', $product->id) }}"
              method="POST"
              enctype="multipart/form-data"
              class="grid grid-cols-2 gap-6">

            @csrf
            @method('PUT')

            <!-- NAME -->
            <div>
                <label class="text-sm text-gray-600">Tên sản phẩm</label>
                <input type="text" name="name" id="name"
                    value="{{ $product->name }}"
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400 outline-none">
            </div>

            <!-- SLUG -->
            <div>
                <label class="text-sm text-gray-600">Slug</label>
                <input type="text" name="slug" id="slug"
                    value="{{ $product->slug }}"
                    readonly
                    class="w-full border px-4 py-2 rounded-lg bg-gray-100">
            </div>

            <!-- CATEGORY -->
            <div>
                <label class="text-sm text-gray-600">Danh mục</label>
                <select name="category_id"
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400">
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}"
                            {{ $product->category_id == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- BRAND -->
            <div>
                <label class="text-sm text-gray-600">Thương hiệu</label>
                <select name="brand_id"
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400">
                    @foreach($brands as $br)
                        <option value="{{ $br->id }}"
                            {{ $product->brand_id == $br->id ? 'selected' : '' }}>
                            {{ $br->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- PRICE -->
            <div>
                <label class="text-sm text-gray-600">Giá nhập</label>
                <input type="number" name="price_buy"
                    value="{{ $product->price_buy }}"
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400">
            </div>

            <div>
                <label class="text-sm text-gray-600">Giá bán</label>
                <input type="number" name="price_sale"
                    value="{{ $product->price_sale }}"
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400">
            </div>

            <!-- QTY -->
            <div>
                <label class="text-sm text-gray-600">Số lượng</label>
                <input type="number" name="qty"
                    value="{{ $product->qty }}"
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400">
            </div>

            <!-- STATUS -->
            <div>
                <label class="text-sm text-gray-600">Trạng thái</label>
                <select name="status"
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400">
                    <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>✔ Hiển thị</option>
                    <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>⛔ Ẩn</option>
                </select>
            </div>

            <!-- IMAGE -->
            <div class="col-span-2">
                <label class="text-sm text-gray-600">Hình ảnh</label>

                <div class="flex items-center gap-4 mt-2">

                    @if ($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}"
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

            <!-- DETAIL -->
            <div class="col-span-2">
                <label class="text-sm text-gray-600">Chi tiết</label>
                <textarea name="detail" rows="3"
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400">{{ $product->detail }}</textarea>
            </div>

            <!-- DESCRIPTION -->
            <div class="col-span-2">
                <label class="text-sm text-gray-600">Mô tả</label>
                <textarea name="description" rows="3"
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-400">{{ $product->description }}</textarea>
            </div>

            <!-- BUTTON -->
            <div class="col-span-2 flex justify-end gap-3 mt-4">

                <a href="{{ route('product.index') }}"
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
