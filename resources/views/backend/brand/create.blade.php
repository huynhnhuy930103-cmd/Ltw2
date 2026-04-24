<x-layout-admin>

<div class="max-w-3xl mx-auto bg-white shadow-lg rounded-xl p-6">

    {{-- TITLE --}}
    <h2 class="text-2xl font-bold text-gray-800 mb-6">
        ➕ Thêm thương hiệu
    </h2>

    {{-- SUCCESS --}}
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- ERROR --}}
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc ml-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('brand.store') }}"
          method="POST"
          enctype="multipart/form-data"
          class="space-y-5">

        @csrf

        {{-- NAME --}}
        <div>
            <label class="font-semibold text-gray-700">Tên thương hiệu</label>
            <input type="text"
                   name="name"
                   id="name"
                   value="{{ old('name') }}"
                   class="w-full mt-1 border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400 outline-none">
        </div>

        {{-- SLUG --}}
        <div>
            <label class="font-semibold text-gray-700">Slug</label>
            <input type="text"
                   name="slug"
                   id="slug"
                   value="{{ old('slug') }}"
                   class="w-full mt-1 border rounded-lg px-3 py-2 bg-gray-100"
                   readonly>
        </div>

        {{-- SORT --}}
        <div>
            <label class="font-semibold text-gray-700">Thứ tự</label>
            <input type="number"
                   name="sort_order"
                   value="{{ old('sort_order', 0) }}"
                   class="w-full mt-1 border rounded-lg px-3 py-2">
        </div>

        {{-- IMAGE --}}
        <div>
            <label class="font-semibold text-gray-700">Hình ảnh</label>
            <input type="file"
                   name="image"
                   class="w-full mt-1 border rounded-lg px-3 py-2">
        </div>

        {{-- DETAIL (FIX ĐÚNG FIELD VỚI CONTROLLER) --}}
        <div>
            <label class="font-semibold text-gray-700">Chi tiết thương hiệu</label>
            <textarea name="detail"
                      rows="4"
                      class="w-full mt-1 border rounded-lg px-3 py-2">{{ old('detail') }}</textarea>
        </div>

        {{-- STATUS --}}
        <div>
            <label class="font-semibold text-gray-700">Trạng thái</label>
            <select name="status"
                    class="w-full mt-1 border rounded-lg px-3 py-2">
                <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Hiển thị</option>
                <option value="2" {{ old('status') == 2 ? 'selected' : '' }}>Ẩn</option>
            </select>
        </div>

        {{-- BUTTONS --}}
        <div class="flex gap-3 pt-4">

            <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-5 py-2 rounded-lg transition">
                💾 Lưu
            </button>

            <a href="{{ route('brand.index') }}"
               class="bg-gray-500 hover:bg-gray-600 text-white px-5 py-2 rounded-lg transition">
                ← Quay lại
            </a>

        </div>

    </form>

</div>

{{-- SLUG AUTO --}}
<script>
    const nameInput = document.getElementById('name');
    const slugInput = document.getElementById('slug');

    nameInput.addEventListener('input', function () {
        let slug = this.value
            .toLowerCase()
            .normalize('NFD')
            .replace(/[\u0300-\u036f]/g, '')
            .replace(/[^a-z0-9\s-]/g, '')
            .trim()
            .replace(/\s+/g, '-');

        slugInput.value = slug;
    });
</script>

</x-layout-admin>
