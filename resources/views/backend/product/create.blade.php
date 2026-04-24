<x-layout-admin>

<div class="min-h-screen bg-gradient-to-br from-emerald-100 via-blue-50 to-indigo-100 p-6">

    <div class="max-w-6xl mx-auto bg-white/80 backdrop-blur-md p-8 rounded-2xl shadow-xl border border-gray-200">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-gray-800">
                ➕ Thêm sản phẩm mới
            </h2>

            <a href="{{ route('product.index') }}"
               class="px-5 py-2 rounded-lg bg-gray-400 text-white hover:bg-gray-500">
                ← Quay lại
            </a>
        </div>

        <form action="{{ route('product.store') }}"
              method="POST"
              enctype="multipart/form-data"
              class="grid grid-cols-2 gap-6">

            @csrf

            <!-- NAME -->
            <div>
                <label class="text-sm text-gray-600">Tên sản phẩm</label>
                <input type="text" name="name" id="name" value="{{old('name')}}"
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-emerald-400 outline-none"
                    placeholder="Nhập tên sản phẩm...">
                    @if ($errors->has('name'))
                        <p class="text-red-500 text-sm mt-1">{{ $errors->first('name') }}</p>
                    @endif
            </div>

            <!-- SLUG -->
            <div>
                <label class="text-sm text-gray-600">Slug</label>
                <input type="text" name="slug" id="slug"
                    readonly
                    class="w-full border px-4 py-2 rounded-lg bg-gray-100">
            </div>

            <!-- CATEGORY -->
            <div>
                <label class="text-sm text-gray-600">Danh mục</label>
                <select name="category_id"
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-emerald-400">
                    <option value="">--Chọn danh mục--</option>

                    @foreach ($categories as $cat)
                    @php
                    $select_categories = old('category_id') == $cat->id ? 'selected' : '';
                    @endphp
                        <option value="{{ $cat->id }}" {{ $select_categories }}>{{ $cat->name }}</option>
                    @endforeach
                </select>
                 @if ($errors->has('category_id'))
                        <p class="text-red-500 text-sm mt-1">{{ $errors->first('category_id') }}</p>
                    @endif
            </div>

            <!-- BRAND -->
            <div>
                <label class="text-sm text-gray-600">Thương hiệu</label>
                <select name="brand_id"
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-emerald-400">
                    <option value="">--Chọn thương hiệu--</option>

                    @foreach ($brands as $br)
                    @php
                    $select_brands = old('brand_id') == $br->id ? 'selected' : '';
                    @endphp
                        <option value="{{ $br->id }}" {{ $select_brands }}>{{ $br->name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('brand_id'))
                        <p class="text-red-500 text-sm mt-1">{{ $errors->first('brand_id') }}</p>
                    @endif
            </div>

            <!-- PRICE -->
            <div>
                <label class="text-sm text-gray-600">Giá nhập</label>
                <input type="number" name="price_buy" min="1000" step="1000"
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-emerald-400" placeholder="0"
                    value="{{ old('price_buy', 1000) }}">
            </div>

            <div>
                <label class="text-sm text-gray-600">Giá bán</label>
                <input type="number" name="price_sale" min="1000" step="1000"
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-emerald-400" placeholder="0"
                    value="{{ old('price_sale', 1000) }}">
            </div>

            <!-- QTY -->
            <div>
                <label class="text-sm text-gray-600">Số lượng</label>
                <input type="number" name="qty" min="1"
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-emerald-400" placeholder="0"
                    value="{{ old('qty', 1 ) }}">
            </div>

            <!-- STATUS -->
            <div>
                <label class="text-sm text-gray-600">Trạng thái</label>
                <select name="status"
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-emerald-400">
                    <option value="1" {{ old('status') == 1 ? 'selected' : ''}}>✔ Hiển thị</option>
                    <option value="0" {{ old('status') == 0 ? 'selected' : ''}}>⛔ Ẩn</option>
                </select>
            </div>

            <!-- IMAGE -->
            <div class="col-span-2">
                <label class="text-sm text-gray-600">Hình ảnh</label>

                <div class="flex items-center gap-4 mt-2">

                    <div id="preview"
                         class="h-24 w-24 flex items-center justify-center bg-gray-100 rounded-xl text-gray-400 border">
                        IMG

                    </div>

                    <input type="file"
                           name="image"
                           class="flex-1 border px-4 py-2 rounded-lg">
                </div>
            </div>

            <!-- DETAIL -->
            <div class="col-span-2">
                <label class="text-sm text-gray-600">Chi tiết</label>
                <textarea name="detail" rows="3"
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-emerald-400"
                    placeholder="Nhập chi tiết sản phẩm...">{{ old('detail') }}
                    </textarea>
                     @if ($errors->has('detail'))
                        <p class="text-red-500 text-sm mt-1">{{ $errors->first('detail') }}</p>
                    @endif
            </div>

            <!-- DESCRIPTION -->
            <div class="col-span-2">
                <label class="text-sm text-gray-600">Mô tả</label>
                <textarea name="description" rows="3"
                    class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-emerald-400"
                    placeholder="Nhập mô tả sản phẩm...">{{ old('description') }}</textarea>
            </div>

            <!-- BUTTON -->
            <div class="col-span-2 flex justify-end gap-3 mt-4">

                <a href="{{ route('product.index') }}"
                   class="px-5 py-2 rounded-lg bg-gray-400 text-white hover:bg-gray-500">
                    Hủy
                </a>

                <button
                    class="px-6 py-2 rounded-lg text-white bg-gradient-to-r from-emerald-500 to-green-500 hover:scale-105 transition shadow-lg">
                    💾 Lưu sản phẩm
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
        const preview = document.getElementById('preview');
        preview.innerHTML = "";
        const img = document.createElement("img");
        img.src = URL.createObjectURL(file);
        img.className = "h-24 w-24 object-cover rounded-xl";
        preview.appendChild(img);
    }
}
</script>

</x-layout-admin>
