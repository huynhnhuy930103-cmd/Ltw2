<x-layout-admin>

    <h2 class="text-2xl font-bold mb-4">Thêm Contact</h2>
    <a href="{{ route('contact.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">
        ← Quay lại
    </a>

    <form action="{{ route('contact.store') }}" method="POST" class="bg-white p-6 border rounded space-y-4">

        @csrf

        {{-- NAME --}}
        <div>
            <label class="block font-semibold mb-1">Họ tên</label>
            <input type="text" name="name" placeholder="Nhập họ tên" class="border w-full p-2 rounded">
        </div>

        {{-- EMAIL --}}
        <div>
            <label class="block font-semibold mb-1">Email</label>
            <input type="email" name="email" placeholder="Nhập email" class="border w-full p-2 rounded">
        </div>

        {{-- PHONE --}}
        <div>
            <label class="block font-semibold mb-1">Số điện thoại</label>
            <input type="text" name="phone" placeholder="Nhập số điện thoại" class="border w-full p-2 rounded">
        </div>

        {{-- TITLE --}}
        <div>
            <label class="block font-semibold mb-1">Tiêu đề</label>
            <input type="text" name="title" placeholder="Nhập tiêu đề" class="border w-full p-2 rounded">
        </div>

        {{-- CONTENT --}}
        <div>
            <label class="block font-semibold mb-1">Nội dung</label>
            <textarea name="content" rows="5" placeholder="Nhập nội dung" class="border w-full p-2 rounded"></textarea>
        </div>

        {{-- BUTTON --}}
        <button class="bg-green-600 text-white px-4 py-2 rounded">
            Lưu Contact
        </button>

    </form>

</x-layout-admin>
